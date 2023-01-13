<?php

require_once 'AppController.php';
require_once 'TeamController.php';
require_once __DIR__.'/../models/Event.php';
require_once __DIR__.'/../repository/EventRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/TeamRepository.php';

class EventController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpg', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/events/';
    const TRACK_PATH = '/public/uploads/events/';

    const RESULTS_FILE_UPLOAD_DIRECTORY = '/../public/uploads/results/';
    const RESULTS_FILE_PATH = '/public/uploads/results/';

    private $messages = [];
    private $eventRepository;
    private $userRepository;
    private $teamRepository;

    public function __construct()
    {
        parent::__construct();
        $this->eventRepository = new EventRepository();
        $this->userRepository = new UserRepository();
        $this->teamRepository = new TeamRepository();
    }

    public function event()
    {
        $eventId = $_GET['id'];
        $this->renderEvent($eventId);
    }

    private function renderEvent(int $eventId)
    {
        $this->extendCookies();
        $event = $this->eventRepository->getEventWithId($eventId);
        date("Y-m-d") > $event->getDate() ? $finished = true : $finished = false;
        if ($finished) {
            $results = $this->eventRepository->getResults($eventId);
        }

        $participants = $this->userRepository->getParticipantsOfEvent($eventId);
        $this->render('event', ['event' => $event,
            'id' => $eventId,
            'participants' => $participants,
            'finished' => $finished,
            'results' => $results]);
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
                '',
                self::TRACK_PATH.$_FILES['file']['name']
            );
            $event->setTeamId($this->userRepository->getTeamId($_COOKIE['user']));

            $id = $this->eventRepository->saveEvent($event);

            $this->renderEvent($id);
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

    public function getEventParticipants()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            $teamName =  $this->teamRepository->getNameOfTeamWithId($_COOKIE['teamId']);

            $participants = $this->userRepository->getParticipantsOfEvent($decoded['eventId']);
            $participantsArray = [];
            foreach ($participants as $participant) {
                if ($decoded['participants'] == 'team') {
                    if ($participant->getTeam() == $teamName) {
                        $participantsArray[] = $participant->jsonSerialize();
                    }
                } else {
                    $participantsArray[] = $participant->jsonSerialize();
                }
            }
            echo json_encode($participantsArray);
        }
    }

    public function updateResults()
    {
        move_uploaded_file(
            $_FILES['file']['tmp_name'],
            dirname(__DIR__).self::RESULTS_FILE_UPLOAD_DIRECTORY.$_FILES['file']['name']
        );

        $fileName = dirname(__DIR__).self::RESULTS_FILE_UPLOAD_DIRECTORY.$_FILES['file']['name'];
        $results = array();

        if (($open = fopen($fileName, "r")) !== FALSE)
        {
            while (($data = fgetcsv($open, 100, ';')) !== FALSE) {
                $results[] = $data;
            }
            fclose($open);
        }

        array_pop($results);
        foreach ($results as $result) {
            $this->eventRepository->updateResults($result[0], $result[1], $result[2]);
        }

        $this->renderEvent($results[0][0]);
    }

    public function deleteEvent()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            $eventId = $decoded['idToDelete'];

            $this->eventRepository->deleteEvent($eventId);
        }
    }
}