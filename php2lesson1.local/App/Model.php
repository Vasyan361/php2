<?php

namespace App;

use App\Models\Article;

abstract class Model
{

    protected static $table = null;

    public $id;

    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table;
        return $db->query($sql, [], static::class);
    }

    public static function fyidById(int $id)
    {
        foreach (Article::findAll() as $value){
            if ($value->id == $id){
                return $value;
            }
        }

        return false;
    }

}