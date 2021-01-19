<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository 
{
    public function getUser(string $login): ?User
    {
        $statement = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE login = :login 
        ');
        $statement->bindParam(':login', $login, PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user == false)
        {
            return null;
        }

        return new User(
            $user['login'],
            $user['password'],
            $user['name'],
            $user['role_id']
        );
    }

    public function getPassword(string $login): string
    {
        $statement = $this->database->connect()->prepare('
            SELECT password FROM public.users WHERE login = :login 
        ');
        $statement->bindParam(':login', $login, PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $user['password'];
    }

    public function getRoleAndJoinDate(string $login): array
    {
        $statement = $this->database->connect()->prepare('
            SELECT role_id, join_date FROM public.users WHERE login = :login 
        ');
        $statement->bindParam(':login', $login, PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $user;
    }

    public function getUserInfo(string $login): array
    {
        $statement = $this->database->connect()->prepare('
            SELECT users.name as user_name, join_date, roles.name as role_name FROM users INNER JOIN roles ON users.role_id = roles.id WHERE login = :login
        ');
        $statement->bindParam(':login', $login, PDO::PARAM_STR);
        $statement->execute();

        $userInfo = $statement->fetch(PDO::FETCH_ASSOC);

        return $userInfo;
    }

    public function changePassword($login, $password): void
    {
        $statement = $this->database->connect()->prepare('
            UPDATE public.users SET password = :password WHERE login = :login 
        ');
        $statement->bindParam(':login', $login, PDO::PARAM_STR);
        $statement->bindParam(':password', $password, PDO::PARAM_STR);
        $statement->execute();
    }
}