<?php

require __DIR__ . '/../autoload.php';

if (isset($_GET['id']) && '' != $_GET['id']) {
    if (is_numeric($_GET['id'])) {
        $article = \App\Models\Article::findById($_GET['id']);

        if (empty($article)) {
            http_response_code(404);
            exit();
        }

        $view =new \App\View();
        $view->article = $article;
        $view->display(__DIR__ . '/Templates/edit.php');

    } else {
        http_response_code(404);
        exit();
    }
} else {
    $view = new \App\View();
    $view->display(__DIR__ . '/Templates/edit.php');
}