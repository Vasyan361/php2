<?php

namespace App;

abstract class Controller
{

    protected $view;
    protected $twigView;

    public function __construct()
    {
        $this->view = new View();
        $this->twigView = new TwigView();
    }

    protected function acsess()
    {
        return true; // в простейшем случае метод всегда возвращает true, но здесь можно сделать сложную проверку
        // в том числе, является ли пользователь админом. Поэтому создавать другую точку входа для админа считаю нецелосообразно.
    }

    public function action(string $name)
    {
        $method = 'action' . $name;

        if ($this->acsess()) {
            $this->$method();
        } else {
            http_response_code(403);
            die();
        }

    }

}