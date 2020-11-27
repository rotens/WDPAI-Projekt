<?php

require_once "AppController.php";
require_once __DIR__."/../models/User.php";

class SecurityController extends AppController
{
    public function login() 
    {
        $user = new User("psobczak", "MrJocker", "Piotr Sobczak", [1], "admin");
        $login = $_POST['login'];
        $password = $_POST['password'];

        if ($user->getLogin() !== $login)
            return $this->render('login', ["messages" => ["User doesn't exist!"]]);

        if ($user->getPassword() !== $password)
            return $this->render('login', ["messages" => ["Wrong password!"]]);

        return $this->render('main');
    }
}