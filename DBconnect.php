<?php


class DBconnect
{
    public $username;
    public $password;
    public $dsn;

    public function __construct()
    {
        $this->username = "root";
        $this->password = "123456@Abc";
        $this->dsn = "mysql:host=localhost;dbname=library_manager";
    }

    public function connect()
    {
        $conn = null;
        try {
            $conn = new PDO($this->dsn, $this->username, $this->password);

        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
        return $conn;
    }
}
