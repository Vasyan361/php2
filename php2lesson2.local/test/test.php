<?php

require __DIR__ . '/../autoload.php';

/*$article = new \App\Models\Article(); //тест добавления новой статьи
$article->newArticle('Заголовок', 'Статья');
$article->save();*/

/*$article = \App\Models\Article::fyidById(9); //тест обновления статьи
$article->title = '123';
$article->save();*/

/*$article = \App\Models\Article::fyidById(8); //тест удаления статьи
$article->delete();*/

$config = \App\Config::getConfig(); // тест синглтона
var_dump($config);

$data = \App\Config::getConfig();
var_dump($data);
