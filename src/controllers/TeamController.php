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

    public function addTeam()
    {
        $teamName = $_POST['teamName'];
        $userId = $this->userRepository->getUserId($_COOKIE['user']);

        $teamId = $this->teamRepository->addTeam($teamName);
        $this->setCookieLive('teamId', $teamId, time() + 3600, '/');
        $this->userRepository->joinTeam($teamId, $userId);

        $this->teamPage($teamId);
    }

    public function team()
    {
        $this->extendCookies();
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
        $userId = $this->userRepository->getUserId($_COOKIE['user']);
        $teamId = $_POST['teamId'];

        $this->setCookieLive('teamId', $teamId, time() + 3600, '/');
        $this->userRepository->joinTeam($teamId, $userId);


        $this->teamPage($teamId);
    }

    public function leaveTeam()
    {
        $userId = $this->userRepository->getUserId($_COOKIE['user']);
        $this->userRepository->leaveTeam($userId);
        setcookie("teamId", '0', time() - 7000000, '/');

        $this->teamListPage();
    }

    private function teamPage(int $teamId)
    {
        $members = $this->userRepository->getMembersOfTeam($teamId);
        $this->render('team', ["members" => $members, "messages" => $this->messages, "id" => $teamId]);
    }

    private function teamListPage()
    {
        $teams = $this->teamRepository->getAllTeams();
        $this->render('team_list', ['teams' => $teams]);
    }

    public function deleteTeam()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            $teamId = $decoded['idToDelete'];

            echo 'dupa';

            $this->teamRepository->deleteTeam($teamId);
        }
    }
}