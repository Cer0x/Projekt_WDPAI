<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::post('login', 'SecurityController');
Router::get('entries', 'EntryController');
Router::get('map', 'DefaultController');
Router::get('userstat', 'DefaultController');
Router::get('addEntry', 'DefaultController');
Router::post('addEntry', 'EntryController');
Router::get('register', 'DefaultController');
Router::post('register', 'SecurityController');


Router::run($path);