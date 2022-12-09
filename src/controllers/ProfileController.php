<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/UserRepository.php';

class ProfileController extends AppController
{
    public function profile()
    {
        $userRepository = new UserRepository();
        $user = $userRepository->getUser($_COOKIE["user"]);

//        $user_details = array("name" => $user->getName(),
//                                "surname" => $user->getSurname(),
//                                "email" => $user->getEmail());

        $this->render('profile', ['user_details' => ["name" => $user->getName(),
            "surname" => $user->getSurname(),
            "email" => $user->getEmail()]]);
    }
}