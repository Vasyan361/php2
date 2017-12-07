<?php

require __DIR__ . '/../autoload.php';

if (isset($_POST['title']) && isset($_POST['lead'])) {

    $article = new \App\Models\Article();
    $article->title = $_POST['title'];
    $article->lead = $_POST['lead'];
    $article->save();

    header('Location: /Admin/');
} else {
    include __DIR__ . '/Templates/create.php';
}