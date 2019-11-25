<?php

namespace Anax\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 * The controller will be injected with $di if implementing the interface
 * ContainerInjectableInterface, like this sample class does.
 * The controller is mounted on a particular route and can then handle all
 * requests for that mount point.
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class IPController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;



    /**
     * @var string $db a sample member variable that gets initialised
     */
    // private $db = "not active";



    /**
     * The initialize method is optional and will always be called before the
     * target method/action. This is a convienient method where you could
     * setup internal properties that are commonly used by several methods.
     *
     * @return void
     */
    public function initialize() : void
    {
        // Use to initialise member variables.
        // $this->db = "active";
    }

    public function indexAction() : object
    {
        $page = $this->di->get("page");

        $page->add("anax/ip/default");

        return $page->render();
    }

    public function testAction() {
        $ip = $this->di->request->getGet("ip") ?? null;
        
        $validIP = !!filter_var($ip, FILTER_VALIDATE_IP);

        $hostname = $validIP ? gethostbyaddr($ip) : null;
        $hostname = !is_null($validIP) ? !filter_var($hostname, FILTER_VALIDATE_IP) ? $hostname : null : null;

        $data = [
            "ip" => $ip,
            "hostname" => $hostname,
            "valid" => $validIP
        ];

        header("Content-Type: application/json");

        return json_encode($data);
    }

    public function indexActionPost() : string
    {
        $body = json_decode($this->di->request->getBody());
        $ip = $body->ip ?? null;
        
        $validIP = !!filter_var($ip, FILTER_VALIDATE_IP);

        $hostname = $validIP ? gethostbyaddr($ip) : null;
        $hostname = !is_null($validIP) ? !filter_var($hostname, FILTER_VALIDATE_IP) ? $hostname : null : null;

        $data = [
            "ip" => $ip,
            "hostname" => $hostname,
            "valid" => $validIP
        ];

        // header("Content-Type: application/json");

        return json_encode($data);
    }
}
