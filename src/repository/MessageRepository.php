<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Message.php';

class MessageRepository extends Repository 
{
    public function getMessages(string $name, string $date_from, string $date_to, string $searched_content)
    {
        if ($name == "all")
            $name = "%";

        if (empty($searched_content)) {
            $searched_content = "%";
        }
        else {
            $searched_content = "%" . strtolower($searched_content) . "%";
        }

        if (empty($date_from) && empty($date_to)) {
            $statement = $this->database->connect()->prepare('
                SELECT * FROM v_messages WHERE name LIKE :name AND LOWER(message) LIKE :searched_content
            ');
        }
        else if (empty($date_from)) {
            $statement = $this->database->connect()->prepare('
                SELECT * FROM v_messages WHERE name LIKE :name AND date <= :date_to AND LOWER(message) LIKE :searched_content
            ');
            $statement->bindParam(':date_to', $date_to, PDO::PARAM_STR);
        }
        else if (empty($date_to)) {
            $statement = $this->database->connect()->prepare('
                SELECT * FROM v_messages WHERE name LIKE :name AND date >= :date_from AND LOWER(message) LIKE :searched_content
            ');
            $statement->bindParam(':date_from', $date_from, PDO::PARAM_STR);
        }
        else {
            $statement = $this->database->connect()->prepare('
                SELECT * FROM v_messages WHERE name LIKE :name AND date >= :date_from AND date <= :date_to AND LOWER(message) LIKE :searched_content
            ');
            $statement->bindParam(':date_to', $date_to, PDO::PARAM_STR);
            $statement->bindParam(':date_from', $date_from, PDO::PARAM_STR);
        }

        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':searched_content', $searched_content, PDO::PARAM_STR);
        $statement->execute();

        $messages = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $messages;
    }

    public function getGroupedBy(string $method, string $account_name) 
    {
        if ($account_name == 'all')
            $account_name = '%';

        switch ($method) {

            case "year":
                $statement = $this->database->connect()->prepare('
                    SELECT extract(year from date) as year_date, count(*) FROM v_messages WHERE name LIKE :name GROUP BY year_date
                ');
                break;

            case "month":
                $statement = $this->database->connect()->prepare('
                    SELECT extract(month from date) as month_date, count(*) FROM v_messages WHERE name LIKE :name GROUP BY month_date
                ');
                break;

            case "day":
                $statement = $this->database->connect()->prepare('
                    SELECT extract(day from date) as day_date, count(*) FROM v_messages WHERE name LIKE :name GROUP BY day_date
                ');
                break;

            case "weekday":
                $statement = $this->database->connect()->prepare('
                    SELECT extract(isodow from date) as weekday_date, count(*) FROM v_messages WHERE name LIKE :name GROUP BY weekday_date
                ');
                break;
             
            case "hour":
                $statement = $this->database->connect()->prepare('
                    SELECT extract(hour from date) as hour_date, count(*) FROM v_messages WHERE name LIKE :name GROUP BY hour_date
                ');
                break;

            case "year_month":
                $statement = $this->database->connect()->prepare('
                    SELECT extract(year from date) as year_date, extract(month from date) as month_date, count(*) FROM v_messages WHERE name LIKE :name GROUP BY year_date, month_date
                ');
                break;
        }

        $statement->bindParam(':name', $account_name, PDO::PARAM_STR);
        $statement->execute();

        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }
}