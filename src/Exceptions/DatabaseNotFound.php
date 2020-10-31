<?php

namespace SaeedVaziry\IP2Location\Exceptions;

class DatabaseNotFound extends \Exception
{
    /**
     * @var string
     */
    protected $message = 'Database not found! Download IP database via `php artisan ip2location:update`';
}
