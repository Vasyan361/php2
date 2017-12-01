<?php

require __DIR__ . '/autoload.php';

if (isset($_POST['title']) && isset($_POST['lead'])){

    $article = new \App\Models\Article();
    $article->newArticle($_POST['lead'], $_POST['title']);
    $article->save();
    header('Location: /admin.php');

}  else{
    echo 'ошибка';
}?>

<a href="/admin.php">
    <button>Назад</button>
</a>

