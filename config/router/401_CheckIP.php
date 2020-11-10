<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "Check en IP",
            "mount" => "checkIP",
            "handler" => "\Anax\Controller\IPController",
        ],
    ]
];
