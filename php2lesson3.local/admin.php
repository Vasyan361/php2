<?php

require __DIR__ . '/autoload.php';

$view = new \App\View();

if (isset($_GET['id']) && false != \App\Models\Article::fyidById($_GET['id'])){
    $view->id = $_GET['id'];
    $view->article = \App\Models\Article::fyidById($_GET['id']);
} // функция для выбора нужной формы при обновлении новости

$view->display(__DIR__ . '/App/Templates/admin.php');