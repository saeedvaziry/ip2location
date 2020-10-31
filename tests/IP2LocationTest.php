<?php

namespace SaeedVaziry\IP2Location\Tests;

use SaeedVaziry\IP2Location\Facades\IP2Location;

class IP2LocationTest extends TestCase
{
    /**
     * set up test case
     */
    protected function setUp(): void
    {
        parent::setUp();

        if (!file_exists(__DIR__ . '/../' . config('ip2location.db_path'))) {
            $this->artisan('ip2location:update');
        }
    }

    /**
     * @var string[]
     */
    protected $randomIps = [
        '28.99.23.237',
        '39.228.224.138',
        '57.246.172.134',
        '113.130.59.175',
        '156.42.224.234',
        '6.6.28.144',
        '84.45.229.33',
        '33.123.92.6',
        '38.155.178.70',
        '176.156.14.63',
    ];

    /**
     * test ip info from request ip
     */
    public function testInfoWithRequestIP()
    {
        $info = IP2Location::info();

        $this->assertEquals('127.0.0.1', $info['ipAddress']);
        $this->assertEquals('-', $info['countryName']);
        $this->assertEquals('-', $info['countryCode']);
    }

    /**
     * test country name
     *
     * it should return "-" because the request ip is 127.0.0.1
     */
    public function testCountryNameWithRequestIP()
    {
        $countryName = IP2Location::countryName();

        $this->assertEquals('-', $countryName);
    }

    /**
     * test country code
     *
     * it should return "-" because the request ip is 127.0.0.1
     */
    public function testCountryCodeWithRequestIP()
    {
        $countryCode = IP2Location::countryCode();

        $this->assertEquals('-', $countryCode);
    }

    /**
     * test ip info from manual ip
     */
    public function testInfoWithManualIP()
    {
        $info = IP2Location::info($this->randomIps[rand(0, 9)]);

        $this->assertNotEquals('-', $info['ipAddress']);
        $this->assertNotEquals('-', $info['countryName']);
        $this->assertNotEquals('-', $info['countryCode']);
    }

    /**
     * test country name
     *
     * it should return the country name
     */
    public function testCountryNameWithManualIP()
    {
        $countryName = IP2Location::countryName($this->randomIps[rand(0, 9)]);

        $this->assertNotEquals('-', $countryName);
    }

    /**
     * test country code
     *
     * it should return the country code
     */
    public function testCountryCodeWithManualIP()
    {
        $countryCode = IP2Location::countryCode($this->randomIps[rand(0, 9)]);

        $this->assertNotEquals('-', $countryCode);
    }
}
