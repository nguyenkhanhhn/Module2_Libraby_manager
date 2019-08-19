<?php
include_once "../DBconnect.php";
include_once "borrow.php";

class borrowdb
{
    public $conn;

    public function __construct()
    {
        $db = new DBconnect();
        $this->conn = $db->connect();
    }

    public function getborrow()
    {
        $sql = "SELECT * FROM `BorrowOrder`";
        $mysql = $this->conn->prepare($sql);
        $mysql->execute();
        $mysql->setFetchMode(PDO::FETCH_ASSOC);
        $data = $mysql->fetchAll();
        $arr = [];
        foreach ($data as $value) {
            $borrow = new borrow($value['loan_day'], $value['pay_day']);
            $borrow->borrow_id = $value['borrow_id'];
            array_push($arr, $borrow);
        }
        return $arr;
    }
}