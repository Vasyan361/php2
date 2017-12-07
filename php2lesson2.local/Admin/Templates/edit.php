<!doctype html>
<html lang="ru">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Редактирование новости</title
        >
    </head>

    <body>

        <h1>Редактирование новости</h1>

        <form action="/Admin/update.php" method="post">

            <input type="hidden" name="id" value="<?php echo $article->id; ?>" >
            <br>
            <h3>Заголовок новости</h3>
            <input type="text" name="title" value="<?php echo $article->title; ?>" size="50">
            <br>
            <h3>Текст новости</h3>
            <textarea name="lead" cols="50" rows="20">
                <?php echo $article->lead; ?>
            </textarea>
            <br>
            <input type="submit">

        </form>

    </body>

</html>