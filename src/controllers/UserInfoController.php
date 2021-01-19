<?php

require_once "AppController.php";
require_once __DIR__."/../repository/AccountRepository.php";
require_once __DIR__."/../repository/UserRepository.php";

class UserInfoController extends AppController 
{
    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->accountRepository = new AccountRepository();
    }
    public function user() 
    {
        if (!isset($_SESSION['user']))
        {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }

        $userInfo = $this->userRepository->getUserInfo($_SESSION['user']);
        $accounts = $this->accountRepository->getAccountsByUserLogin($_SESSION['user']);

        return $this->render('user', ['userInfo' => $userInfo, 'accounts' => $accounts]);
    } 
}