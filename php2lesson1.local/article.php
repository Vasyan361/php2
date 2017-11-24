<!doctype html>

<?php

require __DIR__ . '/autoload.php';?>

<html lang="ru">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Статья</title>
    </head>

    <body>

        <a href="/index.php">
            <button>Назад</button>
        </a>

        <?php
            if (isset($_GET['id']) && false != \App\Models\Article::fyidById($_GET['id'])){
                $data = \App\Models\Article::fyidById($_GET['id']); ?>
                <h1><?php echo $data->title; ?></h1>
                <article><?php echo $data->lead; ?></article>
            <?php  } else{
                echo 'Такой новости не существует';
            }
        ?>

    </body>

</html>