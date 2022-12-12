<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/DailyRun.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/DailyRunsRepository.php';

class DailyRunsController extends AppController
{
    private $userRepository;
    private $runsRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->runsRepository = new DailyRunsRepository();
    }

    public function mainpage()
    {
        $runs = $this->runsRepository->getDailyRuns();
        $this->render('mainpage', ['runs' => $runs]);
    }

    public function addRun()
    {
        $creator_id = $this->userRepository->getUserId($_COOKIE["user"]);
        $start_point = $_POST["start_point"];
        $time = $_POST["time"];
        $distance = $_POST["distance"];
        $pace = $_POST["pace"];

        $this->runsRepository->saveRun(new DailyRun($creator_id, $start_point, $time, $distance, $pace));

        self::mainpage();
    }
}