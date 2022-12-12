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

    private $messages = [];
    private $eventRepository;
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->eventRepository = new EventRepository();
        $this->userRepository = new UserRepository();
    }


    public function addEvent()
    {
        if ($this->isPost() && $this->validate())
        {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            //{ ["eventName"]=> string(8) "TestName" ["eventDate"]=> string(10) "2022-12-16"
            // ["eventTime"]=> string(0) "" ["eventLocation"]=> string(4) "Test" ["surfaceType"]=> string(7) "asphalt"
            // ["distance"]=> string(2) "89" ["participants"]=> string(2) "47" }
            $event = new Event();
            $event->setTeamId($this->userRepository->getTeamId($_COOKIE['user']));
            $event->setEventName($_POST['eventName']);
            $event->setDate($_POST['eventDate'] .' ' .$_POST['eventTime']);
            $event->setLocation($_POST['eventLocation']);
            $event->setType($_POST['surfaceType']);
            $event->setDistance($_POST['distance']);
            $event->setTotalParticipants($_POST['participants']);
            $event->setTrackPath(self::UPLOAD_DIRECTORY.$_FILES['file']['name']);

            $this->eventRepository->saveEvent($event);

            $this->render('event', ['messages' => $this->messages]);
        } else {
            $teamController = new TeamController();
            $teamController->setMessages($this->messages);
            $teamController->team();
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