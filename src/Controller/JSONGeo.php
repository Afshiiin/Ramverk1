<?php

namespace Anax\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class JSONGeo implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function initialize() : void
    {
        $this->SingleCurl = new Curlgeo();
    }

    public function indexActionGet()
    {
        $request = $this->di->get("request");
        $ipp = $request->getGet("ip");

        if (filter_var($ipp, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) || filter_var($ipp, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $apiRes = $this->di->get("useIpstack")->curl($ipp);
            $data = [
                "IP Adress" => $apiRes['ip'],
                "Format" => $apiRes['type'],
                "Stad" => $apiRes['city'],
                "Land" => $apiRes['country_name']
            ];
        } else {
            $data = [
                "IP Adress" => "Oppps! IP is not valid",
                "Format" => "-",
                "Stad" => "-",
                "Land" => "-"
            ];
        }
    
        return [$data];
    }
}
