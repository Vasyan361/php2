<?php

require __DIR__ . '/autoload.php';

if (isset($_POST['id']) && false != \App\Models\Article::fyidById($_POST['id'])){
    $article = \App\Models\Article::fyidById($_POST['id']);
    $article->delete();
    header('Location: /admin.php');
} else{
    echo 'ошибка';
}?>

<a href="/admin.php">
    <button>Назад</button>
</a>