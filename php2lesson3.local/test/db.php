<?php

require __DIR__ . '/../autoload.php';

$db = new \App\Db();

$sql = 'INSERT INTO news (title, lead) VALUES (:title, :lead)';
assert(true === $db->execute($sql, [':title' => 'Заголовок', ':lead' => 'Статья']));

$sql = 'UPDATE news SET lead = :lead WHERE title = :title';
assert(true === $db->execute($sql, [':title' => 'Заголовок', ':lead' => 'Новая статья']));
