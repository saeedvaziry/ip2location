# Laravel IP2Location Package

[![](https://img.shields.io/packagist/v/saeedvaziry/ip2location.svg?style=flat-square)](https://packagist.org/packages/saeedvaziry/ip2location)
![](https://github.com/saeedvaziry/ip2location/workflows/Test/badge.svg)
[![StyleCI](https://github.styleci.io/repos/308758323/shield?branch=master)](https://github.styleci.io/repos/308758323?branch=master)
![](https://img.shields.io/packagist/dt/saeedvaziry/ip2location)

IP2Location is a small Laravel package that converts IPs to location.

This package is a wrapper to [IP2Location](https://github.com/chrislim2888/IP2Location-PHP-Module).

## Installation

```shell
composer require saeedvaziry/ip2location
```
## Configuration

Publish configs with the following command

```shell
php artisan vendor:publish --provider="SaeedVaziry\IP2Location\IP2LocationServiceProvider"
```

Then modify `configs/ip2location.php` to set your download URL from IP2Location's website

```php
<?php

return [
    'db_path'      => 'database/bin/IP2LOCATION-LITE-DB1.BIN',
    'download_url' => 'https://download.ip2location.com/lite/IP2LOCATION-LITE-DB1.BIN.ZIP',
];
```

## Updating IP database

After the installation, you need to run the following command for updating the IP database.
```shell
php artisan ip2location:update
```
You can also set a scheduler in your `app/Console/Kernel.php` to keep it up to date.

## Usage

### Facade

You can use `\SaeedVaziry\IP2Location\Facades\IP2Location` facade to access to all supported methods.

```php
// returns an array
\SaeedVaziry\IP2Location\Facades\IP2Location::info($ipAddress);

// returns the country full name
\SaeedVaziry\IP2Location\Facades\IP2Location::countryName($ipAddress);

// returns the country 2 character ISO code
\SaeedVaziry\IP2Location\Facades\IP2Location::countryCode($ipAddress);
```
### Helper functions

You may want to access to the methods via helper functions. 
```php
// returns an array
ip2location_info($ipAddress);

// returns the country full name
ip2location_country_name($ipAddress);

// returns the country 2 character ISO code
ip2location_country_code($ipAddress);
```
If you don't pass the `$ipAddress` in both Facade and Helper, The method will extract the IP address from the Http request.

## License

IP2Location is licensed under The MIT License (MIT).
