<!doctype html>

<?php

require __DIR__ . '/autoload.php';?>

<html lang="ru">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Новости</title>
    </head>

    <body>

    <?php
    foreach (\App\Models\Article::lastNews() as $article){?>


        <a href="<?php echo '/article.php?id=' . $article->id; ?>">

            <h1><?php echo $article->title; ?></h1>
            <article><?php echo $article->lead; ?></article>

        </a>

    <?php } ?>

    </body>

</html>