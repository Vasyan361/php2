<?php

namespace App;

use App\Exceptions\ErrorsExceptions;
use App\Exceptions\Http404Exception;

abstract class Model implements Validation
{

    protected static $table = null;

    public $id;

    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table;
        return $db->query($sql, [], static::class);
    }

    public static function findById(int $id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $data = $db->query($sql, [':id' => $id], static::class);

        if (!empty($data)) {
            return $data[0];
        } else {
            throw new Http404Exception('Такая страниц не найдена');
        }
    }

    public function update()
    {
        $fields = get_object_vars($this);
        $sets = [];
        $data = [];

        foreach ($fields as $name => $value) {
            $data[':' . $name] = $value;
            if ('id' == $name) {
                continue;
            }
            $sets[] = $name . '=:' . $name;
        }

        $sql = '
        UPDATE ' . static::$table . '
        SET ' . implode(', ', $sets) . '
        WHERE id=:id';

        $db = new Db();
        $db->execute($sql, $data);
    }

    public function insert()
    {
        $fields = get_object_vars($this);
        $sets = [];
        $key = [];
        $data = [];

        foreach ($fields as $name => $value) {
            $data[':' . $name] = $value;
            $sets[] =$name;
            $key[] = ':' . $name;
        }

        $sql = '
        INSERT INTO ' . static::$table . ' (' . implode(', ', $sets) . '
        ) VALUES (' . implode(', ', $key) . ')';
        $db = new Db();
        $db->execute($sql, $data);
    }

    public function save()
    {
        if (null == $this->id) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    public function delete()
    {
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';

        $db = new Db();
        $db->execute($sql, [':id' => $this->id]);
        $this->id = $db->lastId();
    }

    public  function fill(array $data)
    {
        if (isset($data['id']) && '' == $data['id']) {
            unset($data['id']);
        }

        $errors = $this->validation($data);

        if (!$errors->empty()) { //если есть исключения то выбрасываем их
            throw $errors;
        }

        foreach ($data as $key => $value) {
            $this->$key = $value;
        } // заполняем свойства значениями
    }



}