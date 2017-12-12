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

    <h1>Создать Новость</h1>

    <?php
    if (!empty($errors)):
        foreach ($errors as $error): ?>
            <h3>Ошибка:</h3>
            <?php echo $error->getMessage(); ?>

            <?php
        endforeach;
    endif; ?>

    <form action="/Admin/Create" method="post">

        <h3>Заголовок новости</h3>
        <br>
        <input type="text" name="title" placeholder="Введите заголовок" size="50" value="<?php
        if (isset($article->title)):
            echo $article->title;
        endif; ?>">
        <br>
        <h3>Текст новости</h3>
        <br>
        <textarea name="lead" placeholder="Введите новость" cols="50" rows="20"><?php
            if (isset($article->lead)):
                echo $article->lead;
            endif; ?></textarea>
        <br>
        <input type="submit">

</form>

</body>

</html>