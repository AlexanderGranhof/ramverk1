<?php
/**
 * Configuration file for DI container.
 */

use \algn\DarkSky\DarkSky;




return [
    
    // Services to add to the container.
    "services" => [
        "darksky" => [
            "shared" => true,
            //"callback" => "\Anax\Response\Response",
            "callback" => function () {
                require __DIR__ . "../../../config/keys.php";
                return new DarkSky($darkSkyKey);
            }
        ],
    ],
];
