<?php
/**
 * Created by PhpStorm.
 * User: Vasya
 * Date: 25.11.2017
 * Time: 4:23
 */

namespace App;


class Config
{

    protected static $config = null;

    public $data;

    protected function __construct()
    {
        $this->data = include __DIR__ . '/../config.php';
    }

    public static function getConfig()
    {
        if (null == self::$config) {
            self::$config = new self();
        }

        return self::$config;
    }

}