<?php

// namespace Anax\Controller;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

class DarkSkyTest extends TestCase
{
    public function testToday()
    {
        $darksky = new Anax\DarkSky\DarkSky();
        [$lat, $lng] = ["56.1806550", "15.5907000"];

        $result = $darksky->today($lat,$lng);

        $this->assertIsObject($result);
    }
    public function testWeek()
    {
        $darksky = new Anax\DarkSky\DarkSky();
        [$lat, $lng] = ["56.1806550", "15.5907000"];

        $result = $darksky->week($lat,$lng);

        $this->assertIsObject($result);
    }
    public function test30Days()
    {
        $darksky = new Anax\DarkSky\DarkSky();
        [$lat, $lng] = ["56.1806550", "15.5907000"];

        $result = $darksky->past_30_days($lat,$lng);

        $this->assertIsObject($result);
    }
}
