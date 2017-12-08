<?php

require __DIR__ . '/autoload.php';

$url = $_SERVER['REQUEST_URI'];
$urlParts = explode('/', $url);

$controller = $urlParts[1] ?: 'Index';
$action = $urlParts[2] ?: 'Default';

$class = '\\App\\Controllers\\' . $controller;
$ctrl = new $class;
$ctrl->action($action);