<?php

namespace Anax\Controller;

use Anax\DI\DIMagic;
use PHPUnit\Framework\TestCase;

class IpControllerTest extends TestCase
{

    public function setUp()
    {
        global $di;
        $this->di = new DIMagic();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $di = $this->di;
        $this->controller = new IpController();
        $this->controller->setDI($this->di);
    }

    public function testindexActionPostCorrect2()
    {
        $_POST["ip_adress"] = "1.1.1.1";
     
        $res = $this->controller->indexAction();
        $gett = $res->getBody();
        $this->assertIsString($gett);
    }
  

    public function testindexActionPostCorrect()
    {
        $_POST["ip_adress"] = "1.1.1.1";
     
        $res = $this->controller->indexActionPost();
        $gett = $res->getBody();
        $this->assertIsString($gett);
    }

    
    public function testindexActionPostCorrect3()
    {
        $_POST["ip_adress"] = "2620:119:35::35";
     
        $res = $this->controller->indexActionPost();
        $gett = $res->getBody();
        $this->assertIsString($gett);
    }

    public function testindexActionPostFail()
    {
        $_POST["ip_adress"] = "5.5.5.5.5";
     
        $res = $this->controller->indexActionPost();
        $gett = $res->getBody();
        $this->assertIsString($gett);
    }
}
