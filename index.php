<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::post('login', 'SecurityController');
Routing::get('logout', 'DefaultController');
Routing::post('signup', 'SecurityController');
Routing::get('calendar', 'CalendarController');
Routing::get('event', 'DefaultController');
Routing::get('profile', 'ProfileController');
Routing::get('team', 'TeamController');
Routing::post('addEvent', 'EventController');
Routing::post('addRun', 'DailyRunsController');
Routing::get('mainpage', 'DailyRunsController');
Routing::run($path);
