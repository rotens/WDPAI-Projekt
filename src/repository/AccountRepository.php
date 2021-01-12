<?php

require_once 'Repository.php';

class AccountRepository extends Repository 
{
    public function getAccounts()
    {
        $statement = $this->database->connect()->prepare('
            SELECT name FROM public.accounts 
        ');
        $statement->execute();

        $accounts = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $accounts;
    }
}