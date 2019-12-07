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
class WeatherController implements ContainerInjectableInterface
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
        // var_dump($this->di->get("darksky"));
    }

    public function indexAction() : object
    {
        $page = $this->di->get("page");

        $page->add("anax/weather/docs");

        return $page->render();
    }

    public function testAction(): object {
        $page = $this->di->get("page");

        $page->add("anax/weather/prev");

        return $page->render();
    }

    public function customAction() : string
    {
        include __DIR__ . "../../../config/keys.php";


        $darksky = $this->di->get("darksky");

        $ip = $this->di->request->getGet("ip") ?? null;
        $location = $this->di->request->getGet("location") ?? null;

        $getPrevData = $this->di->request->getGet("prev");

        [$lat, $lng] = explode(",", $location);

        if (is_null($location)) {
            header('HTTP/1.1 400 Bad Request');
            return "Bad Request - Missing 'location' in body";
        }

        if (!strpos($location, ",")) {
            header('HTTP/1.1 400 Bad Request');
            return "Bad Request - Missing ',' in location parameter";
        }

        [$lat, $lng] = explode(",", $location);
        
        $isIP = !!filter_var($ip, FILTER_VALIDATE_IP);
        
        if ($isIP) {
            $data = file_get_contents("http://api.ipstack.com/$ip?access_key=$IP_STACK_KEY");

            $json = json_decode($data);

            $lat = $json->latitude;
            $lng = $json->longitude;
        }

        header("Content-Type: application/json");

        
        if ($getPrevData) {
            return $darksky->past30Days($lat, $lng);
        }
        
        $result = $darksky->week($lat, $lng);

        return json_encode($result);
        
    }

    public function indexActionPost() : string
    {
        include __DIR__ . "../../../config/keys.php";

        $darksky = $this->di->get("darksky");
        $body = json_decode($this->di->request->getBody());

        $ip = $body->ip ?? null;
        $location = $body->location ?? null;

        $getPrevData = $body->prev ?? null;

        [$lat, $lng] = explode(",", $location);

        if (is_null($location)) {
            header('HTTP/1.1 400 Bad Request');
            return "Bad Request - Missing 'location' in body";
        }

        if (!strpos($location, ",")) {
            header('HTTP/1.1 400 Bad Request');
            return "Bad Request - Missing ',' in location parameter";
        }

        [$lat, $lng] = explode(",", $location);
        
        $isIP = !!filter_var($ip, FILTER_VALIDATE_IP);
        
        if ($isIP) {
            $data = file_get_contents("http://api.ipstack.com/$ip?access_key=$IP_STACK_KEY");

            $json = json_decode($data);

            $lat = $json->latitude;
            $lng = $json->longitude;
        }

        header("Content-Type: application/json");

        if ($getPrevData) {
            return $darksky->past30Days($lat, $lng);
        }

        $result = $darksky->today($lat, $lng);

        return json_encode($result);

    //     include __DIR__ . "../../../config/keys.php";

    //     $body = json_decode($this->di->request->getBody());
        
    //     $location = $body->location ?? null;
        
    //     if (is_null($location)) {
    //         header('HTTP/1.1 400 Bad Request');
    //         return "Bad Request - Missing 'location' in body";
    //     }
        
    //     $isIP = !!filter_var($location, FILTER_VALIDATE_IP);
        
    //     if ($isIP) {
    //         $data = file_get_contents("http://api.ipstack.com/$location?access_key=$IP_STACK_KEY");

    //         $json = json_decode($data);

    //         $position = $json->latitude . "," . $json->longitude;

    //         if (strlen($position) < 3) {
    //             header('HTTP/1.1 404 Page Not Found');
    //             return "Bad Request - No cordinates found for '$location'";
    //         }

    //         $data = file_get_contents("https://api.darksky.net/forecast/$darkSkyKey/$position");

    //         header("Content-Type: application/json");

    //         return $data;

    //     } else if(strpos($location, ",")) {
    //         return "cords";
    //     }

    //     header('HTTP/1.1 400 Bad Request');
    //     return "Bad Request - Cords";
    }
}