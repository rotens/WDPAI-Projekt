<?php

require "Routing.php";

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('main', 'DefaultController');
Router::get('user', 'DefaultController');
Router::get('search', 'DefaultController');
Router::get('statistics', 'DefaultController');
Router::post('login', 'SecurityController');

Router::run($path);
