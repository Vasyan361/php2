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
        $config = file(__DIR__ . '/../config.txt', FILE_IGNORE_NEW_LINES);
        $this->data =[];
        foreach ($config as $value){
            $foo = explode('=', $value);
            $this->data[$foo[0]] = $foo[1];
            $foo = [];
        }

    }

    public static function getConfig()
    {
        if (null == self::$config){
            self::$config = new self();
        }
        return self::$config;
    }

}