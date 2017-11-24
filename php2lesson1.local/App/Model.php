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
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $data = $db->query($sql, [':id' => $id], static::class);
        if (!empty($data)){
            return $data[0];
        } else {
            return false;
        }
        
    }

}