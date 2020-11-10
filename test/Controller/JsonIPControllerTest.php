<?php

namespace Anax\Controller;

use Anax\DI\DIMagic;
use PHPUnit\Framework\TestCase;

class JsonIpControllerTest extends TestCase
{

    public function setUp()
    {
        global $di;
        $this->di = new DIMagic();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $di = $this->di;
        $this->controller = new JSON();
        $this->controller->setDI($this->di);
    }


    public function testindexActionPostCorrect()
    {
        $_POST["ip"] = "1.1.1.1";
        $res = $this->controller->indexActionPost();
        $this->assertIsArray($res);
    }

    public function testindexActionGetFail()
    {
        $_POST["ip"] = "5.5.5.5.5";
        $res = $this->controller->indexActionPost();
        $this->assertIsArray($res);
    }
}
