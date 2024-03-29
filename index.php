<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');

Routing::post('login', 'SecurityController');
Routing::post('logout', 'SecurityController');
Routing::post('signup', 'SecurityController');

Routing::get('calendar', 'CalendarController');

Routing::get('profile', 'ProfileController');
Routing::post('updateProfilePic', 'ProfileController');
Routing::post('getStats', 'ProfileController');

Routing::get('team', 'TeamController');
Routing::post('addTeam', 'TeamController');
Routing::post('deleteTeam', 'TeamController');
Routing::get('joinTeam', 'TeamController');
Routing::get('leaveTeam', 'TeamController');

Routing::get('event', 'EventController');
Routing::get('getEventParticipants', 'EventController');
Routing::post('addEvent', 'EventController');
Routing::post('deleteEvent', 'EventController');
Routing::post('signupForEvent', 'EventController');
Routing::post('updateResults', 'EventController');

Routing::post('addRun', 'DailyRunsController');
Routing::post('signupForRun', 'DailyRunsController');
Routing::get('mainpage', 'DailyRunsController');

Routing::run($path);
