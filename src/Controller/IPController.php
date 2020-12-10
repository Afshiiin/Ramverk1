<?php

namespace Anax\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class IPController implements ContainerInjectableInterface
{
   
    use ContainerInjectableTrait;

    public function indexAction()
    {

        $page = $this->di->get("page");

        $data = array();

        $page->add("anax/myViews/checkEnIP/get_ip", $data);

        return $page->render([
            "title" => "Check en IP",
        ]);
    }


   

    public function indexActionPost()
    {
        $page = $this->di->get("page");
      
   
        $ipp = $_POST["ip_adress"];
       
        $valid = "IPn är ogiltig";
        $host = "Domian hittades inte";
        
       // if ($gett->getPost("option") == "Normal"){

        if (filter_var($ipp, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $valid = "IPV6";
            $host = gethostbyaddr($ipp);
        } elseif (filter_var($ipp, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $valid = "IPV4";
            $host = gethostbyaddr($ipp);
        }

        $data = array(
            "ip" => $ipp,
            "valid" => $valid,
            "host" => $host
        );
       
        
        $page->add("anax/myViews/checkEnIP/get_ip", $data);
        echo "\r\n<p class='p-hide'>\r\n";
        echo "IP:".$ipp."\r\n";
        echo "Format:".$valid."\r\n";
        echo "Domain:".$host."\r\n</p>\r\n";
        return $page->render([
            "title" => "Check en IP",
        ]);
      //  }
    }
}
