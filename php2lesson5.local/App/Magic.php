<?php

namespace App;

trait Magic
{

    protected $data; //= ['a', 'b', 'c']; Изпользовал для теста интерфейса Iterator

    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function __get($key)
    {
        return $this->data[$key];
    }

    public function __isset($key)
    {
        return isset($this->data[$key]);
    }

}