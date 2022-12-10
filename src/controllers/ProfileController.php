<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/TeamRepository.php';

class ProfileController extends AppController
{
    public function profile()
    {
        $userRepository = new UserRepository();
        $teamRepository = new TeamRepository();

        $user = $userRepository->getUser($_COOKIE["user"]);
        $teamName = $teamRepository->getTeamNameOfUser($userRepository->getUserId($user->getEmail()));

//        $user_details = array("name" => $user->getName(),
//                                "surname" => $user->getSurname(),
//                                "email" => $user->getEmail());

        $this->render('profile', ['user_details' => ["name" => $user->getName(),
            "surname" => $user->getSurname(),
            "teamName" => $teamName,
            "email" => $user->getEmail()]]);
    }
}