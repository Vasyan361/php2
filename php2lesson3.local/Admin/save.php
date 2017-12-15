<?php

require __DIR__ . '/../autoload.php';

if (isset($_POST['id'])) {
    if (is_numeric($_POST['id']) && isset($_POST['title']) && isset($_POST['lead'])) {
        $article = \App\Models\Article::findById($_POST['id']);
        $article->title = $_POST['title'];
        $article->lead = $_POST['lead'];
        $article->save();

    } elseif ('' == $_POST['id'] && isset($_POST['title']) && isset($_POST['lead'])) {
        $article = new \App\Models\Article();
        $article->title = $_POST['title'];
        $article->lead = $_POST['lead'];
        $article->save();
    }
}

header('Location: /Admin/');