<?php

class Message 
{
    private $user;
    private $date;
    private $content;

    public function __construct(string $user, string $date, string $content)
    {
        $this->user = $user;
        $this->date = $date;
        $this->content = $content;
    }

    public function getUser(): string 
    {
        return $this->user;
    }

    public function getDate(): string 
    {
        return $this->date;
    }

    public function getContent(): string 
    {
        return $this->content;
    }
}