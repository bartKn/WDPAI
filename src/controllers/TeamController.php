<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/UserRepository.php';

class TeamController extends AppController
{
    private $userRepository;
    private $messages = [];

    public function setMessages(array $messages)
    {
        $this->messages = $messages;
    }

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function team()
    {
        $team_id = $this->userRepository->getTeamId($_COOKIE["user"]);

        if ($team_id != 0) {
            self::teamPage($team_id);
        } else {
            self::teamListPage();
        }
    }

    private function teamPage(int $teamId)
    {
        $members = $this->userRepository->getMembersOfTeam($teamId);
        $this->render('team', ["members" => $members, "messages" => $this->messages]);
    }

    private function teamListPage()
    {
        $this->render('team_list');
    }
}