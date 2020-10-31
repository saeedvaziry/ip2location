<?php

namespace SaeedVaziry\IP2Location\Tests;

class UpdateIPsCommandTest extends TestCase
{
    /**
     * test update ips database
     */
    public function testUpdateIps()
    {
        $this->artisan('ip2location:update');

        $this->assertDirectoryExists(__DIR__ . '/../database/bin');

        $this->assertFileDoesNotExist(__DIR__ . '/../database/bin/db.zip');

        $this->assertFileExists(__DIR__ . '/../database/bin/IP2LOCATION-LITE-DB1.BIN');
    }
}
