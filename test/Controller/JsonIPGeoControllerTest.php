<?php

namespace Anax\Controller;

use Anax\DI\DIMagic;
use PHPUnit\Framework\TestCase;

class JsonIpGeoControllerTest extends TestCase
{

    public function setUp()
    {
        global $di;
        $this->di = new DIMagic();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $di = $this->di;
        $this->controller = new JSONGeo();
        $this->controller->initialize();
        $this->controller->setDI($this->di);
    }


    public function testindexActionPostCorrect()
    {
        $_GET["ip"] = "2620:119:35::35";
        $res = $this->controller->indexActionGet();
        $this->assertIsArray($res);
    }

    public function testindexActionPostCorrect2()
    {
        $_GET["ip"] = "1.1.1.1";
        $res = $this->controller->indexActionGet();
        $this->assertIsArray($res);
    }



    public function testindexActionGetFail()
    {
        $_GET["ip"] = "1.1.1.1.1";
        $res = $this->controller->indexActionGet();
        $this->assertIsArray($res);
    }
}
