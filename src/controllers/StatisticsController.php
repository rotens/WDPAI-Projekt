<?php

require_once "AppController.php";
require_once __DIR__."/../repository/AccountRepository.php";
require_once __DIR__."/../repository/MessageRepository.php";

class StatisticsController extends AppController 
{
    public function __construct()
    {
        parent::__construct();
        $this->accountRepository = new AccountRepository();
        $this->messageRepository = new MessageRepository();
    }

    public function statistics()
    {
        if (!isset($_SESSION['user']))
        {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }

        $accounts = $this->accountRepository->getAccounts();

        if (!$this->isPost()) {
            return $this->render('statistics', ['accounts' => $accounts]);
        }

        $account_name = $_POST['account'][0];
        $group_by = $_POST['groupby'][0];
        
        switch ($group_by) {

            case "year":
                $columns = ["Rok", "Liczba wiadomości"];
                $results = $this->messageRepository->getGroupedBy("year", $account_name);
                break;

            case "month":
                $columns = ["Miesiąc", "Liczba wiadomości"];
                $results = $this->messageRepository->getGroupedBy("month", $account_name);
                break;

            case "day":
                $columns = ["Dzień", "Liczba wiadomości"];
                $results = $this->messageRepository->getGroupedBy("day", $account_name);
                break;

            case "weekday":
                $columns = ["Dzień tygodnia", "Liczba wiadomości"];
                $results = $this->messageRepository->getGroupedBy("weekday", $account_name);
                break;

            case "hour":
                $columns = ["Godzina", "Liczba wiadomości"];
                $results = $this->messageRepository->getGroupedBy("hour", $account_name);
                break;

            case "year_month":
                $columns = ["Rok", "Miesiąc", "Liczba wiadomości"];
                $results = $this->messageRepository->getGroupedBy("year_month", $account_name);
                break;
        }

        return $this->render('statistics', ['accounts' => $accounts, 'columns' => $columns, 'results' => $results]);
    }
}