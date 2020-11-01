<?php

namespace SaeedVaziry\IP2Location\Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array|string[]
     */
    protected function getPackageProviders($app)
    {
        return ['SaeedVaziry\IP2Location\IP2LocationServiceProvider'];
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array|string[]
     */
    protected function getPackageAliases($app)
    {
        return [
            'IP2Location' => 'SaeedVaziry\IP2Location\Facades\IP2Location',
        ];
    }
}
