<?php

namespace Anax\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class IPControllerGeo implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexAction()
    {
    // get ip from visitor
        $page = $this->di->get("page");
        $visitorIP = $_SERVER['REMOTE_ADDR'];
        $visitorIP = [
            "ip" => $visitorIP
        ];

        $page->add("anax/myViews/checkEnIP/get_ip_geo", $visitorIP);

        return $page->render([
            "title" => "IP-Geo",
        ]);
    }


   
    public function indexActionPost()
    {
 

        $request = $this->di->get("request");
        $page = $this->di->get("page");

        $ipp = $request->getPost("ip");
       
        $apiRes = false;

        if (filter_var($ipp, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) || filter_var($ipp, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $apiRes = $this->di->get("useIpstack")->curl($ipp);
            $data = [
                "ip" => $apiRes['ip'],
                "ip_type" => $apiRes['type'],
                "country_name" => $apiRes['country_name'],
                "city" => $apiRes['city']
            ];
        } else {
            $data = [
                "ip" => "Oppps! IP is not valid",
                "ip_type" => "-",
                "country_name" => "-",
                "city" => "-"
            ];
        }
      
        $page->add("anax/myViews/checkEnIP/get_ip_geo", $data);

        return $page->render([
            "title" => "IP-Geo"
        ]);
    }
}
