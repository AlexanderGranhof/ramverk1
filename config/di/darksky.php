<?php
/**
 * Configuration file for DI container.
 */
return [

    // Services to add to the container.
    "services" => [
        "darksky" => [
            "shared" => true,
            //"callback" => "\Anax\Response\Response",
            "callback" => function () {
                return new \Anax\DarkSky\DarkSky();
            }
        ],
    ],
];
