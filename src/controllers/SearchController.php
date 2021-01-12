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

        $account_name = $_POST['Account'][0];
        $date_from = $_POST['from'];
        $date_to = $_POST['to'];
        $searched_content = $_POST['search_input'];

        $messages = $this->messageRepository->getMessages($account_name, $date_from, $date_to, $searched_content);
        
        return $this->render('search', ['accounts' => $accounts, 'messages' => $messages]);
    }
}