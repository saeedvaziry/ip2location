<?php

if (!function_exists('ip2location_info')) {
    /**
     * get ip2location info.
     *
     * @param null $ip
     *
     * @return array
     */
    function ip2location_info($ip = null)
    {
        return \SaeedVaziry\IP2Location\Facades\IP2Location::info($ip);
    }
}

if (!function_exists('ip2location_country_name')) {
    /**
     * get ip2location country name.
     *
     * @param null $ip
     *
     * @return string
     */
    function ip2location_country_name($ip = null)
    {
        return \SaeedVaziry\IP2Location\Facades\IP2Location::countryName($ip);
    }
}

if (!function_exists('ip2location_country_code')) {
    /**
     * get ip2location country code.
     *
     * @param null $ip
     *
     * @return string
     */
    function ip2location_country_code($ip = null)
    {
        return \SaeedVaziry\IP2Location\Facades\IP2Location::countryCode($ip);
    }
}
