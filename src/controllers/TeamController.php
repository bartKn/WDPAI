<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/TeamRepository.php';

class TeamController extends AppController
{
    private $userRepository;
    private $teamRepository;
    private $messages = [];

    public function setMessages(array $messages)
    {
        $this->messages = $messages;
    }

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->teamRepository = new TeamRepository();
    }

    public function team()
    {
        if (isset($_GET['n'])) {
            $team_id = $this->teamRepository->getTeamId($_GET['n']);
        } else {
            $team_id = $this->userRepository->getTeamId($_COOKIE["user"]);
        }


        if ($team_id != 0) {
            self::teamPage($team_id);
        } else {
            self::teamListPage();
        }
    }

    public function joinTeam()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            $teamId = $this->teamRepository->getTeamId($decoded['teamName']);
            $userId = $this->userRepository->getUserId($_COOKIE['user']);
            $this->userRepository->joinTeam($teamId, $userId);
            $members = $this->userRepository->getMembersOfTeam($teamId);

            $membersArray = [];
            foreach ($members as $member) {
                $membersArray[] = $member->jsonSerialize();
            }
            echo json_encode($membersArray);
        }
    }

    public function leaveTeam()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            $userId = $this->userRepository->getUserId($_COOKIE['user']);

            header('Content-type: application/json');
            http_response_code(200);
        }
    }

    private function teamPage(int $teamId)
    {
        $members = $this->userRepository->getMembersOfTeam($teamId);
        $this->render('team', ["members" => $members, "messages" => $this->messages, "id" => $teamId]);
    }

    private function teamListPage()
    {
        $this->render('team_list');
    }
}