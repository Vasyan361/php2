<?php

namespace App;

class Logger
{

    public static function writeLog(\Throwable $ex)
    {
        $error = gmstrftime("%d %m %G %R") . ' Ошибка: ' . $ex->getMessage() . ' В файле: ' . $ex->getFile() .
            ' на строчке: ' . $ex->getLine() . PHP_EOL;
        file_put_contents(__DIR__ . '/../errors.txt', $error, FILE_APPEND);
    }

}