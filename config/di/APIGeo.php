<?php
/**
 * Creating the session as a $di service.
 */
return [
    "services" => [
        "useIpstack" => [
            "shared" => true,
            "callback" => function () {
                $apiClass = new \Anax\Controller\Curlgeo();
                $configuration = $this->get("configuration");
                $loadconfiguration = $configuration->load("KeysOfApi.php");
                $apiClass->setKey($loadconfiguration['config']['ipstack_key']);
                return $apiClass;
            }
        ],
    ],
];
