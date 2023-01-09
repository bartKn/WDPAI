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

        $participants = array();
        foreach ($runs as $run) {
            $participants += [$run['id'] => $this->runsRepository->getParticipants($run['id'])];
        }

        $userId = $this->userRepository->getUserId($_COOKIE["user"]);
        $this->render('mainpage', ['runs' => $runs, 'participants' => $participants, 'user' => $userId]);
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

    public function signupForRun()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            $userId = $this->userRepository->getUserId($_COOKIE['user']);
            $this->runsRepository->signupForRun($decoded['runId'], $userId);

            header('Content-type: application/json');
            http_response_code(200);
        }
    }
}