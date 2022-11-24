<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('index', 'DefaultController');
Routing::get('calendar', 'DefaultController');
Routing::get('event', 'DefaultController');
Routing::get('login', 'DefaultController');
Routing::get('mainpage', 'DefaultController');
Routing::get('profile', 'DefaultController');
Routing::get('signup', 'DefaultController');
Routing::get('team', 'DefaultController');
Routing::run($path);
