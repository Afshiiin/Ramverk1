<?php

namespace Anax\Controller;

class Curlgeo
    {
        private $Api;
        public function setKey($Api)
        {
            $this->Api = $Api;
        }

        public function curl($ip)
        {
            $myKey = $this->Api;
            $address = 'http://api.ipstack.com/'.$ip.'?access_key='.$myKey.'';

            $check = curl_init($address);
            curl_setopt($check, CURLOPT_RETURNTRANSFER, true);

            $t_res = curl_exec($check);
            curl_close($check);
            $josnfromt = json_decode($t_res, true);

            return $josnfromt;
        }
    }
