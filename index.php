<?php

require "Routing.php";

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('home', 'DefaultController');
Router::get('user', 'DefaultController');
Router::get('search', 'DefaultController');
Router::get('statistics', 'DefaultController');
Router::get('change_password', 'DefaultController');
Router::post('login', 'SecurityController');
Router::post('changePassword', 'SecurityController');
Router::get('logout', 'SecurityController');

Router::run($path);
