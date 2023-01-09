<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('logout', 'DefaultController');

Routing::post('login', 'SecurityController');
Routing::post('signup', 'SecurityController');

Routing::get('calendar', 'CalendarController');

Routing::get('profile', 'ProfileController');
Routing::post('updateProfilePic', 'ProfileController');

Routing::get('team', 'TeamController');
Routing::get('joinTeam', 'TeamController');
Routing::get('leaveTeam', 'TeamController');

Routing::get('event', 'EventController');
Routing::post('addEvent', 'EventController');
Routing::post('signupForEvent', 'EventController');

Routing::post('addRun', 'DailyRunsController');
Routing::post('signupForRun', 'DailyRunsController');
Routing::get('mainpage', 'DailyRunsController');

Routing::run($path);
