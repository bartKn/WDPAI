<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/UserRepository.php';

class TeamController extends AppController
{
    public function team()
    {
        $userRepository = new UserRepository();

        $team_id = $userRepository->getTeamId($_COOKIE["user"]);

        if ($team_id != 0) {
            self::teamPage();
        } else {
            self::teamListPage();
        }
    }

    private function teamPage()
    {
        $this->render('team');
    }

    private function teamListPage()
    {
        $this->render('team_list');
    }
}