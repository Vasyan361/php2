<?php

require __DIR__ . '/../autoload.php';

$items = \App\Models\Article::findAll();

include __DIR__ . '/Templates/index.php';