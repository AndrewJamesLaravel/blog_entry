<?php

class Table

{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    protected function makeStatement($sql, $data = null)
    {
        //create PDOStatement object
        $statement = $this->db->prepare($sql);
        try {
            $statement->execute($data);
        } catch (Exception $e) {
            $exceptionMessage = "<p>You tried to run this sql: $sql </p>
                                <p>Exception $e</p>";
            trigger_error($exceptionMessage);
        }
        //return the PDOStatement object
        return $statement;
    }
}