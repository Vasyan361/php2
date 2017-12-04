<?php

require __DIR__ . '/autoload.php';

if (!empty($_GET['id'])) {
    $article = \App\Models\Article::fyidById($_GET['id']);

    if (empty($article)) {
        http_response_code(404);
    }

    include __DIR__ . '/App/Templates/article.php';

}  else {
    http_response_code(404);
};


