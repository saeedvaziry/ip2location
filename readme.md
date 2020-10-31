# Laravel IP2Location Package

[![](https://img.shields.io/packagist/v/saeedvaziry/ip2location.svg?style=flat-square)](https://packagist.org/packages/saeedvaziry/ip2location)
![](https://github.com/saeedvaziry/ip2location/workflows/Test/badge.svg)

IP2Location is a small Laravel package that converts IPs to location.

This package is a wrapper to [IP2Location](https://github.com/chrislim2888/IP2Location-PHP-Module).

## Installation

    composer require saeedvaziry/ip2location

## Updating IP database

After the installation, you need to run the following command for updating the IP database.

    php artisan ip2location:update

You can also set a scheduler in your `app/Console/Kernel.php` to keep it up to date.

## Usage

### Facade

You can use `\SaeedVaziry\IP2Location\IP2Location` facade to access to all supported methods.

    // returns an array
    \SaeedVaziry\IP2Location\Facades\IP2Location::info($ipAddress);
    
    // returns the country full name
    \SaeedVaziry\IP2Location\Facades\IP2Location::countryName($ipAddress);
    
    // returns the country 2 character ISO code
    \SaeedVaziry\IP2Location\Facades\IP2Location::countryCode($ipAddress);
   
### Helper functions

You may want to access to the methods via helper functions. 
   
    // returns an array
    ip2location_info($ipAddress);
    
    // returns the country full name
    ip2location_country_name($ipAddress);
    
    // returns the country 2 character ISO code
    ip2location_country_code($ipAddress);

If you don't pass the `$ipAddress` in both Facade and Helper, The method will extract the IP address from the Http request.

## License

IP2Location is licensed under The MIT License (MIT).
