<?php

namespace App\Models;

use App\Db;
use App\Model;

/**
 * Class Article
 *
 * @property $author
 */
class Article extends Model
{

    protected static $table = 'news';


    public $title;
    public $lead;
    public $author_id;

    public function __get($name)
    {
        if ('author' ==  $name && isset($this->author_id)){
            return Author::fyidById($this->author_id);
        } else{
            return null;
        }
    }

    public function newArticle(string $lead, string $title)
    {
        $this->lead = $lead;
        $this->title = $title;
    }

    public static function lastNews()
    {
        $db = new Db();
        $sql = 'SELECT * FROM news ORDER BY id DESC LIMIT 3';
        $data = $db->query($sql, [], self::class);
        if (!empty($data)){
            return $data;
        } else{
            return false;
        }
    }


}