<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    
    public function index() {
        $this->render('login');
    }

    public function calendar() {
        $this->render('calendar');
    }

    public function event() {
        $this->render('event');
    }

    public function login() {
        $this->render('login');
    }

    public function logout() {
        setcookie("user", '', time() - 7000000, '/');
        $this->render('login');
    }

    public function mainpage() {
        $this->render('mainpage');
    }

    public function profile() {
        $this->render('profile');
    }

    public function signup() {
        $this->render('signup');
    }

    public function team() {
        $this->render('team');
    }
}