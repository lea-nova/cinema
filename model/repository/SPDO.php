<?php

namespace Model\repository;

class SPDO
{
    private $PDOInstance = null;
    private static $instance = null;

    private function __construct()
    {
        $this->PDOInstance = new \PDO("mysql:host=localhost:8889;dbname=cinema", "userweb", "userweb");
    }
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new SPDO();
        }
        return self::$instance->getPDO();
    }

    private function getPDO()
    {
        return $this->PDOInstance;
    }
}
