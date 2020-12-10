<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "Check en IP Geo",
            "mount" => "checkIPGep",
            "handler" => "\Anax\Controller\IPControllerGeo",
        ],
    ]
];
