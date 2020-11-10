<?php

namespace Anax\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class JSON implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexActionGet()
    {
        $request = $this->di->get("request");

        $ipp = $request->getGet("ip");
        $valid = "Ogiltig IP";
        $host = "Domian hittades inte";

        if (filter_var($ipp, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $valid = "IPV6";
            $host = gethostbyaddr($ipp);
        } elseif (filter_var($ipp, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $valid = "IPV4";
            $host = gethostbyaddr($ipp);
        }

        $json = [
            "ip" => $ipp,
            "format" => $valid,
            "domain" => $host,
        ];

        return [$json];
    }

    public function indexActionPost()
    {
        $request = $this->di->get("request");

        $ipp = $request->getPost("ip");
        $valid = "Ogiltig IP";
        $host = "Domian hittades inte";

        if (filter_var($ipp, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $valid = "IPV6";
            $host = gethostbyaddr($ipp);
        } elseif (filter_var($ipp, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $valid = "IPV4";
            $host = gethostbyaddr($ipp);
        }

        $json = [
            "ip" => $ipp,
            "format" => $valid,
            "domain" => $host,
        ];

        $arr = array('IP' => $ipp, 'Format' => $valid, 'Domain' => $host);
        echo "\r\n".json_encode($arr, JSON_PRETTY_PRINT);

        return [$json];
    }
}
