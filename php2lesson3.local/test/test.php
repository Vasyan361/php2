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

/*$config = \App\Config::getConfig(); // тест синглтона
var_dump($config->data);

$data = \App\Config::getConfig();
var_dump($data);*/

/*$view = new \App\View(); //тест интерфейса Countable
$view->news = \App\Models\Article::lastNews();
$view->foo = 42;
$view->bar = 24;

echo count($view);*/

$it = new \App\View(); //тест интерфейса Iterator

foreach ($it as $key => $value){
    var_dump($key, $value);
    echo PHP_EOL;
}