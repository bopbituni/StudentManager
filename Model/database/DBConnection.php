<?php

namespace Model;

use PDO;
use PDOException;

class DBConnection
{
    private $dsn;
    private $username;
    private $password;

    public function __construct($dsn, $username, $password)
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;

    }

    public function connect()
    {
        $conn = null;

        try {
            $conn = new PDO($this->dsn, $this->username, $this->password);
        } catch (PDOException $exception) {
            echo " You are bitch!!".$exception->getMessage();
        }

        return $conn;
    }
}