<?php

namespace App;


class AdminDataTable
{
    protected $model;
    protected $func;

    public function __construct($model, array $func)
    {
        $this->model = $model;
        $this->func = $func;
    }

    public function render()
    {
        $cell = [];

        foreach ($this->model as $index => $line) {
            foreach ($this->func as $key => $column) {
                $cell[$index][$key] = $column($line);
            }
        }

        return $cell;
    }

}