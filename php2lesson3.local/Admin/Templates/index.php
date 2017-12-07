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

        <h2>
            <a href="/Admin/create.php">Создать новость</a>
        </h2>

        <h1>Список новостей</h1>

        <table>
            <tr>
                <th>№</th>
                <th>Заголовок</th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach ($items as $item) { ?>
            <tr>
                <td><?php echo $item->id; ?></td>
                <td><?php echo $item->title; ?></td>
                <td>
                    <a href="/Admin/edit.php?id=<?php echo $item->id; ?>">Редактировать</a>
                </td>
                <td>
                    <a href="/Admin/delete.php?id=<?php echo $item->id; ?>">Удалить</a>
                </td>
            </tr>
            <?php }; ?>
        </table>

    </body>

</html>