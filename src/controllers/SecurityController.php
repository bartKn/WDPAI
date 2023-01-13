<?php /** @noinspection PhpVoidFunctionResultUsedInspection */

require_once 'AppController.php';
require_once 'DailyRunsController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login()
    {
        if (!$this->isPost())
        {
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = $this->userRepository->getUserByEmail($email);

        if (!$user)
        {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if (!password_verify($password, $user->getPassword()))
        {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        if (!$role = $this->userRepository->logIn($email))
        {
            return $this->render('login', ['messages' => ['You are already logged in!']]);
        }

        $teamId = $this->userRepository->getTeamId($email);

        $this->setCookieLive("teamId", $teamId, time() + 3600, '/');
        $this->setCookieLive("user", $email, time() + 3600, '/');
        $this->setCookieLive("role", $role, time() + 3600, '/');
        
        $mainpage = new DailyRunsController();
        return $mainpage->mainpage();
    }

    public function logout()
    {
        $this->userRepository->logOut($_COOKIE['user']);
        setcookie("user", '', time() - 7000000, '/');
        setcookie("teamId", '', time() - 7000000, '/');
        setcookie("role", '', time() - 7000000, '/');
        $this->render('login');
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
        $location = $_POST["location"];

        $user = new User($name, $surname, $email, $password);

        if ($userRepository->saveUser($user, $location))
        {
            return $this->render('login', ['messages' => ['You can log in now!']]);
        } else
        {
            return $this->render('signup', ['messages' => ['That email is taken!']]);
        }
    }
}