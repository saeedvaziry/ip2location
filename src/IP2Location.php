<?php

namespace SaeedVaziry\IP2Location;

use IP2Location\Database;
use SaeedVaziry\IP2Location\Exceptions\DatabaseNotFound;

class IP2Location
{
    /**
     * @var Database
     */
    protected $db;

    /**
     * IP2Location constructor.
     *
     * @throws \Exception
     */
    public function __construct()
    {
        try {
            $this->db = new Database(__DIR__.'/../'.config('ip2location.db_path'), Database::FILE_IO);
        } catch (\Exception $e) {
            throw new DatabaseNotFound();
        }
    }

    /**
     * @param null $ip
     *
     * @return array|bool|mixed
     */
    public function info($ip = null)
    {
        return $this->lookup($ip);
    }

    /**
     * @param null $ip
     *
     * @return mixed
     */
    public function countryCode($ip = null)
    {
        $lookup = $this->lookup($ip);

        return $lookup && is_array($lookup) && isset($lookup['countryCode']) ? $lookup['countryCode'] : '-';
    }

    /**
     * @param null $ip
     *
     * @return mixed
     */
    public function countryName($ip = null)
    {
        $lookup = $this->lookup($ip);

        return $lookup && is_array($lookup) && isset($lookup['countryName']) ? $lookup['countryName'] : '-';
    }

    /**
     * @param null $ip
     *
     * @return string|null
     */
    protected function getIp($ip = null)
    {
        if (!$ip) {
            $ip = request()->ip();
        }

        return $ip;
    }

    /**
     * @param $ip
     *
     * @return array|bool|mixed
     */
    protected function lookup($ip)
    {
        return $this->db->lookup($this->getIp($ip), Database::ALL);
    }
}
