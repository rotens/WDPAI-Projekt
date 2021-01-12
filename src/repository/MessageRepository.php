<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Message.php';

class MessageRepository extends Repository 
{
    public function getMessages(string $name, string $date_from, string $date_to, string $searched_content)
    {
        $statement1 = 'SELECT * FROM v_messages WHERE name = :name AND date >= :date_from AND date <= date_to AND message LIKE :searched_content';
        $statement2 = 'SELECT * FROM v_messages WHERE name = :name AND date >= :date_from AND message LIKE :searched_content';
        $statement3 = 'SELECT * FROM v_messages WHERE name = :name AND date <= date_to AND message LIKE :searched_content';

        if ($name == "all")
            $name = "%";

        if (empty($searched_content)) {
            $searched_content = "%";
        }
        else {
            $searched_content = "%" . $searched_content . "%";
        }
        
        if (empty($date_from)) {
            $statement = $statement3;
        }
        else if (empty($date_to)) {
            $statement = $statement2;
        }
        else {
            $statement = $statement1;
        }

        $statement = $this->database->connect()->prepare($statement);
        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':date_from', $date_from, PDO::PARAM_STR);
        $statement->bindParam(':date_to', $date_to, PDO::PARAM_STR);
        $statement->bindParam(':searched_content', $searched_content, PDO::PARAM_STR);
        $statement->execute();

        $messages = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $messages;
    }
}