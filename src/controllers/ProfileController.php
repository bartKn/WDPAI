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
        if (!$this->checkCookies()) return;
        $this->extendCookies();
        if (isset($_GET['id'])) {
            $user = $this->userRepository->getUserById($_GET['id']);
        } else {
            $user = $this->userRepository->getUserByEmail($_COOKIE["user"]);
        }

        $userId = $this->userRepository->getUserId($user->getEmail());
        $stats = $this->userRepository->getUserStats($userId, true);

        $userInfo = $this->userRepository->getUserInfo($userId);
        $teamName = $this->teamRepository->getNameOfTeamWithId($userInfo['team_id']);

        $this->render('profile', ['stats' => $stats, 'user_details' => [
            "id" => $userId,
            "name" => $user->getName(),
            "surname" => $user->getSurname(),
            "teamName" => $teamName,
            "email" => $user->getEmail(),
            "photo" => $userInfo['photo_path'],
            "location" =>$userInfo['location']],
            'messages' => $this->messages]);
    }

    public function updateProfilePic()
    {
        if ($this->isPost() && $this->validate())
        {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

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

    public function getStats()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            $userId = $decoded['id'];
            $allTime = $decoded['period'] === 'all';

            header('Content-type: application/json');
            http_response_code(200);

            $stats = $this->userRepository->getUserStats($userId, $allTime);
            echo json_encode($stats->jsonSerialize());
        }
    }
}