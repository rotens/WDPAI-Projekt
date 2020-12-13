<?php

require_once "AppController.php";
require_once __DIR__."/../models/User.php";
require_once __DIR__."/../repository/UserRepository.php";


class SecurityController extends AppController
{
    public function login() 
    {
        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $login = $_POST['login'];
        $password = $_POST['password'];

        $user = $userRepository->getUser($login);

        if (!$user)
        {
            return $this->render('login', ['messages' => ['User doesn\'t exist']]);
        }

        if ($user->getLogin() !== $login)
            return $this->render('login', ["messages" => ["User doesn't exist!"]]);

        if ($user->getPassword() !== $password)
            return $this->render('login', ["messages" => ["Wrong password!"]]);

        return $this->render('main');
    }
}