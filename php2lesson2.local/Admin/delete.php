<?php

require __DIR__ . '/../autoload.php';

if (!empty($_GET['id'])) {
    $article = \App\Models\Article::findById($_GET['id']);

    if (empty($article)) {
        header('Location: /Admin/');
    }

    $article->delete();
}

header('Location: /Admin/');