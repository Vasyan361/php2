<?php

require __DIR__ . '/../autoload.php';

if (!empty($_GET['id']) ) {
    $article = \App\Models\Article::fyindById($_GET['id']);

    if (empty($article)) {
        http_response_code(404);
        exit();
    }

    include __DIR__ . '/Templates/edit.php';

} else {
    http_response_code(404);
}