<?php

class User 
{
    private $login;
    private $password;
    private $name;
    private $accounts = [];
    private $permissions;


    public function __construct(string $login, string $password, string $name, array $accounts, $permissions)
    {
        $this->login = $login;
        $this->password = $password;
        $this->name = $name;
        $this->accounts = $accounts;
        $this->permissions = $permissions;
    }

    public function getLogin(): string 
    {
        return $this->login;
    }

    public function setLogin(string $login)
    {
        $this->login = $login;
    }

    public function getPassword(): string 
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getName(): string 
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getAccounts(): array
    {
        return $this->accounts;
    }

    public function addAccount(int $id)
    {
        array_push($this->accounts, $id);
    }

    public function getPermissions(): string 
    {
        return $this->permissions;
    }
}