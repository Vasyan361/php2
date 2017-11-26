<?php

require __DIR__ . '/autoload.php';

 if (isset($_GET['id']) && false != \App\Models\Article::fyidById($_GET['id'])){
    $article = \App\Models\Article::fyidById($_GET['id']);
    include __DIR__ . '/App/Templates/article.php';
 } else{
     http_response_code(404);
 }
