<?php

namespace App\Models;

use App\Db;
use App\Errors;
use App\Exceptions\ErrorsExceptions;
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

    public function __get($fullname)
    {
        if ('author' ==  $fullname && isset($this->author_id)) {
            return Author::findById($this->author_id);
        } else {
            return null;
        }
    }

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



    public function validation(array $data)
    {
        $errors = new ErrorsExceptions();

        if (isset($data['title']) && strlen($data['title']) < 10) {
            $errors->add(new \Exception('Слишком короткий Заголовок'));
        }

        if (isset($data['lead']) && strlen($data['lead']) < 30) {
            $errors->add(new \Exception('Слишком короткая статья'));
        }

        return $errors;
    }


}