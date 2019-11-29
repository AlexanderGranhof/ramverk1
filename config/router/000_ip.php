<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "GeoIPController.",
            "mount" => "geotagip",
            "handler" => "\Anax\Controller\GeoIPController",
        ],
        [
            "info" => "G.",
            "mount" => "ip",
            "handler" => "\Anax\Controller\IPController",
        ],
        [
            "info" => "Weather",
            "mount" => "weather",
            "handler" => "\Anax\Controller\WeatherController",
        ]
    ]
];
