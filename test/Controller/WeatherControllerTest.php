<?php

namespace Anax\Controller;

use Anax\DI\DIFactoryConfig;
use Anax\DI\DIMagic;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class WeatherControllerTest extends TestCase
{
    public function testPostIndexAction()
    {
        global $di;

        $di = new DIMagic();
        $di->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");
        // $di->set("request", "\Anax\Request\Request");

        // var_dump($di);

        $di->request->setBody("{\"ip\": \"216.58.207.195\"}");

        $controller = new WeatherController();
        $controller->setDI($di);

        $controller->initialize();
        $res = $controller->indexActionPost();

        $this->assertIsString($res);

        $json = json_decode($res);
        
        $this->assertIsString($json->hostname);
        $this->assertIsString($json->ip);
        $this->assertTrue($json->valid);
    }

    public function testIndexAction()
    {
        global $di;

        $di = new DIMagic();
        $di->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

        $controller = new WeatherController();
        $controller->setDI($di);

        $controller->initialize();
        $res = $controller->indexAction();

        $this->assertIsObject($res);
        $this->assertInstanceOf("Anax\Response\Response", $res);
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
    }
}
