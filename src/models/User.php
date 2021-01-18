<?php

class User 
{
    private $login;
    private $password;
    private $name;
    private $permissions;
    
    public function __construct(string $login, string $password, string $name, string $permissions)
    {
        $this->login = $login;
        $this->password = $password;
        $this->name = $name;
        $this->permissions = $permissions;
    }

    public function getLogin(): string 
    {
        return $this->login;
    }

    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    public function getPassword(): string 
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getName(): string 
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPermissions(): string 
    {
        return $this->permissions;
    }
}