<?php /** @noinspection PhpVoidFunctionResultUsedInspection */

require_once 'AppController.php';
require_once 'DailyRunsController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    public function login()
    {
        $userRepository = new UserRepository();

        if (!$this->isPost())
        {
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = $userRepository->getUserByEmail($email);

        if (!$user)
        {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if (!password_verify($password, $user->getPassword()))
        {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        $teamId = $userRepository->getTeamId($email);

        $this->setCookieLive("teamId", $teamId, time() + 3600, '/');
        $this->setCookieLive("user", $email, time() + 3600, '/');
        
        $mainpage = new DailyRunsController();
        return $mainpage->mainpage();
    }

    public function signup()
    {
        $userRepository = new UserRepository();

        if (!$this->isPost())
        {
            return $this->render('signup');
        }

        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = new User($name, $surname, $email, $password);

        if ($userRepository->saveUser($user))
        {
            return $this->render('login', ['messages' => ['You can log in now!']]);
        } else
        {
            return $this->render('signup', ['messages' => ['That email is taken!']]);
        }
    }
}