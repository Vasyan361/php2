<?php

require __DIR__ . '/autoload.php';

 if (!empty($_GET['id'])) {
     $view = new \App\View();
     $view->article = \App\Models\Article::fyindById($_GET['id']);

     if(empty($view->article)) {
         http_response_code(404);
         exit();
     }

     $view->display(__DIR__ . '/App/Templates/article.php');

 } else {
     http_response_code(404);
 }
