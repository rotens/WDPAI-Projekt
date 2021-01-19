<?php

require_once 'Repository.php';

class AccountRepository extends Repository 
{
    public function getAccounts(): array
    {
        $statement = $this->database->connect()->prepare('
            SELECT name FROM public.accounts 
        ');
        $statement->execute();

        $accounts = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $accounts;
    }

    public function getAccountsByUserLogin(string $login): array
    {
        $statement = $this->database->connect()->prepare('
            SELECT accounts.id as id, accounts.name as name FROM public.accounts INNER JOIN public.users ON users.id = accounts.user_id WHERE login = :login
        ');
        $statement->bindParam(':login', $login, PDO::PARAM_STR);
        $statement->execute();

        $accounts = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $accounts;
    }
}