<?php

require __DIR__ . '/autoload.php';

if (isset($_GET['id']) && false != \App\Models\Article::fyidById($_GET['id'])){
    $id = $_GET['id'];
    $article = \App\Models\Article::fyidById($_GET['id']);
} // функция для выбора нужной формы при обновлении новости

include __DIR__ . '/App/Templates/admin.php';