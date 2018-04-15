<?php

namespace App;


class AdminDataTable
{
    protected $model;
    protected $func;
    protected $view;

    public function __construct($model, array $func)
    {
        $this->model = $model;
        $this->func = $func;
        $this->view = new View();
    }

    public function render()
    {
        $cell = [];

        foreach ($this->model as $index => $line) {
            foreach ($this->func as $key => $column) {
                $cell[$index][$key] = $column($line);
            }
        }

        $this->view->items = $cell;
        $this->view->display(__DIR__ . '/../Admin/Templates/Default.php');
    }

}