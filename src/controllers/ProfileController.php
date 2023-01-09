<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/TeamRepository.php';

class ProfileController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpg', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/profile/';
    const TRACK_PATH = '/public/uploads/profile/';

    private $messages = [];
    private $userRepository;
    private $teamRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->teamRepository = new TeamRepository();
    }


    public function profile()
    {
        if (isset($_GET['id'])) {
            $user = $this->userRepository->getUserById($_GET['id']);
        } else {
            $user = $this->userRepository->getUserByEmail($_COOKIE["user"]);
        }

        $userInfo = $this->userRepository->getUserInfo($this->userRepository->getUserId($user->getEmail()));
        $teamName = $this->teamRepository->getNameOfTeamWithId($userInfo['team_id']);

        $this->render('profile', ['user_details' => ["name" => $user->getName(),
            "surname" => $user->getSurname(),
            "teamName" => $teamName,
            "email" => $user->getEmail(),
            "photo" => $userInfo['photo_path']], 'messages' => $this->messages]);
    }

    public function updateProfilePic()
    {
        if ($this->isPost() && $this->validate())
        {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            echo 'fileName: ' .$_FILES['file']['name'];

            $this->userRepository->saveUserPicture($this->userRepository->getUserId($_COOKIE["user"]),
                self::TRACK_PATH.$_FILES['file']['name']);

        }
        $this->profile();
    }

    private function validate(): bool
    {
        if (!is_uploaded_file($_FILES['file']['tmp_name']))
        {
            $this->messages[] = "You should upload profile picture file!";
            return false;
        }

        $file = $_FILES['file'];

        if ($file['size'] > self::MAX_FILE_SIZE)
        {
            $this->messages[] = "File is too large!";
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES))
        {
            $this->messages[] = "Type is not supported!";
            return false;
        }

        return true;
    }
}