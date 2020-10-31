<?php

namespace SaeedVaziry\IP2Location\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class IP2Location
 *
 * @package SaeedVaziry\IP2Location\Facades
 *
 * @method static array info($ip = null)
 * @method static string countryCode($ip = null)
 * @method static string countryName($ip = null)
 */
class IP2Location extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ip2location';
    }
}
