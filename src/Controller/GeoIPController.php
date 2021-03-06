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
class GeoIPController implements ContainerInjectableInterface
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

        $page->add("anax/geoIP/default");

        return $page->render();
    }

    public function testAction() : string
    {
        $k = base64_decode("NWZhYTE1ZWRlYTkxNTYzYjg1ZTIzMDZhZjNmN2MzOTU=");
        
        $ip = $this->di->request->getGet("ip") ?? null;
        $data = file_get_contents("http://api.ipstack.com/$ip?access_key=$k");
        
        return $data;
    }

    public function indexActionPost() : string
    {
        $k = base64_decode("NWZhYTE1ZWRlYTkxNTYzYjg1ZTIzMDZhZjNmN2MzOTU=");
        $body = json_decode($this->di->request->getBody());
        
        $ip = $body->ip;
        $data = file_get_contents("http://api.ipstack.com/$ip?access_key=$k");
        
        return $data;
    }
}
