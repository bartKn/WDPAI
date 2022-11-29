<?php

require_once 'AppController.php';

class EventController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];

    public function addEvent()
    {
        var_dump($_FILES);
        var_dump($_POST);
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file']))
        {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            return $this->render('event', ['messages' => $this->messages]);
        }
        return $this->render('team', ['messages' => $this->messages]);
    }

    private function validate(array $file): bool
    {
        var_dump($file);
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