<?php

namespace App\Models;

use App\Db;
use App\Model;

class Article extends Model
{

    protected static $table = 'news';


    public $title;
    public $lead;

    public static function lastNews()
    {
        $db = new Db();
        $sql = 'SELECT * FROM news ORDER BY id DESC LIMIT 3';
        $data = $db->query($sql, [], self::class);

        if (!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

}