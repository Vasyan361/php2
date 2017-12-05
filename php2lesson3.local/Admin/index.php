<?php

require __DIR__ . '/../autoload.php';

$view = new \App\View();
$view->items = \App\Models\Article::findAll();
$view->display(__DIR__ . '/Templates/index.php');