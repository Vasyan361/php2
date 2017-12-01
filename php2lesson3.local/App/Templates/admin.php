<!doctype html>
<html lang="ru">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Админ-панель</title>
    </head>

    <body>

        <h3>Добавить новость</h3>

            <form action="/insert.php" method="post">

            <input type="text" name="title" placeholder="Введите заголовок">
            <br>
            <input type="text" name="lead" placeholder="Введите новость">
            <br>
            <input type="submit">

        </form>

        <h3>Добавить автора</h3>

        <form action="/insert.php" method="post">

            <input type="text" name="author" placeholder="Введите автора">
            <br>
            <input type="submit">

        </form>

        <h3>Удалить новость</h3>

        <form action="/delete.php" method="post">

            <input type="text" name="id" placeholder="Введите номер новости">
            <br>
            <input type="submit">

        </form>

        <h3>Обновить новость</h3>

        <?php
        if (!empty($id)): ?>

            <form action="/update.php" method="post">

                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <br>
                <input type="text" name="title" value="<?php echo $article->title; ?>">
                <br>
                <input type="text" name="lead" value="<?php echo $article->lead; ?>">
                <br>
                <input type="submit">

            </form>

        <?php else: ?>

            <form action="/admin.php" method="get">

                <input type="text" name="id" placeholder="Введите номер новости">
                <br>
                <input type="submit">

            </form>

        <?php endif; ?>

    </body>

</html>