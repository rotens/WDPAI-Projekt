<?php

class Message 
{
    private $account_name;
    private $date;
    private $content;

    public function __construct(string $account_name, string $date, string $content)
    {
        $this->account_name = $account_name;
        $this->date = $date;
        $this->content = $content;
    }

    public function getAccountName(): string 
    {
        return $this->account_name;
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