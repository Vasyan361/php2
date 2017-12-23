<!doctype html>
<html lang="ru">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?php echo $article->tittle; ?> </title>
    </head>

    <body>

        <a href="/">
            <button>Назад</button>
        </a>

        <h1><?php echo $article->title; ?></h1>
        <article><?php echo $article->lead; ?></article>
        <em>
            <?php
            if (!is_null($article->author)):
                echo $article->author->fullname;
            else:
                echo 'Нет автора';
            endif;
            ?>
        </em>

    </body>

</html>