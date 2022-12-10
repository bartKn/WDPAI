<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/DailyRun.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/DailyRunsRepository.php';

class DailyRunsController extends AppController
{
    public function mainpage()
    {
        $runsRepository = new DailyRunsRepository();
        $runs = $runsRepository->getDailyRuns();
        $this->render('mainpage', ['runs' => $runs]);
    }

    public function addRun()
    {
        $userRepository = new UserRepository();
        $runsRepository = new DailyRunsRepository();

        $creator_id = $userRepository->getUserId($_COOKIE["user"]);
        $start_point = $_POST["start_point"];
        $time = $_POST["time"];
        $distance = $_POST["distance"];
        $pace = $_POST["pace"];

        $runsRepository->saveRun(new DailyRun($creator_id, $start_point, $time, $distance, $pace));

        self::mainpage();
    }
}