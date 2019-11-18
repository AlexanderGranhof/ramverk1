<?php

namespace Anax\Controller;

use Anax\DI\DIFactoryConfig;
use Anax\DI\DIMagic;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class GeoIPControllerTest extends TestCase
{
    public function testPostIndexAction()
    {
        global $di;

        $di = new DIMagic();
        $di->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");
        // $di->set("request", "\Anax\Request\Request");

        // var_dump($di);

        $di->request->setBody("{\"ip\": \"134.201.250.155\"}");

        $controller = new GeoIPController();
        $controller->setDI($di);

        $controller->initialize();
        $res = $controller->indexActionPost();

        $this->assertIsString($res);

        $json = json_decode($res);
        
        $this->assertIsString($json->ip);
        $this->assertIsString($json->city);

        $di->request->setBody("{\"ip\": \":::1\"}");
        $controller->setDI($di);

        $res = $controller->indexActionPost();

        $this->assertIsString($res);
        
        $json = json_decode($res);

        $this->assertIsString($json->ip);
        $this->assertNull($json->type);
    }

    public function testIndexAction()
    {
        global $di;

        $di = new DIMagic();
        $di->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

        $controller = new GeoIPController();
        $controller->setDI($di);

        $controller->initialize();
        $res = $controller->indexAction();

        $this->assertIsObject($res);
        $this->assertInstanceOf("Anax\Response\Response", $res);
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
    }
}
