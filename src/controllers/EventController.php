<?php

require_once 'AppController.php';
require_once 'TeamController.php';
require_once __DIR__.'/../models/Event.php';
require_once __DIR__.'/../repository/EventRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';

class EventController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpg', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/events/';
    const TRACK_PATH = '/public/uploads/events/';

    private $messages = [];
    private $eventRepository;
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->eventRepository = new EventRepository();
        $this->userRepository = new UserRepository();
    }

    public function event()
    {
        $eventId = $_GET['id'];
        $event = $this->eventRepository->getEventWithId($eventId);
        $participants = $this->userRepository->getParticipantsOfEvent($eventId);
        $this->render('event', ['event' => $event, 'participants' => $participants]);
    }

    public function addEvent()
    {
        if ($this->isPost() && $this->validate())
        {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $event = new Event(
                0,
                $_POST['eventName'],
                $_POST['eventDate'] .' ' .$_POST['eventTime'],
                $_POST['eventLocation'],
                $_POST['surfaceType'],
                $_POST['distance'],
                $_POST['participants'],
                0,
                ''
            );
            $event->setTeamId($this->userRepository->getTeamId($_COOKIE['user']));
            $event->setTrackPath(self::TRACK_PATH.$_FILES['file']['name']);

            $this->eventRepository->saveEvent($event);

            $this->render('event', ['messages' => $this->messages]);
        } else {
            $teamController = new TeamController();
            $teamController->setMessages($this->messages);
            $teamController->team();
        }
    }

    public function signupForEvent()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            $userId = $this->userRepository->getUserId($_COOKIE['user']);
            $this->userRepository->signUpParticipantForEvent($decoded['eventId'], $userId);

            header('Content-type: application/json');
            http_response_code(200);

            $participants = $this->userRepository->getParticipantsOfEvent($decoded['eventId']);
            $participantsArray = [];
            foreach ($participants as $participant) {
                $participantsArray[] = $participant->jsonSerialize();
            }
            echo json_encode($participantsArray);
        }
    }

    private function validate(): bool
    {
        if (!is_uploaded_file($_FILES['file']['tmp_name']))
        {
            $this->messages[] = "You should upload track file!";
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