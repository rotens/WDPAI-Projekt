<?php

require_once "AppController.php";
require_once __DIR__."/../models/Message.php";
require_once __DIR__."/../repository/AccountRepository.php";
require_once __DIR__."/../repository/MessageRepository.php";

class SearchController extends AppController 
{
    public function __construct()
    {
        parent::__construct();
        $this->accountRepository = new AccountRepository();
        $this->messageRepository = new MessageRepository();
    }

    public function search()
    {
        if (!isset($_SESSION['user']))
        {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }

        $accounts = $this->accountRepository->getAccounts();

        if (!$this->isPost()) {
            return $this->render('search', ['accounts' => $accounts]);
        }

        $name = $_POST['User'][0];
        echo $name;
        $date_from = $_POST['from'];
        $date_to = $_POST['to'];
        $searched_content = $_POST['search_input'];

        return $this->render('search', ['accounts' => $accounts]);


    }
}