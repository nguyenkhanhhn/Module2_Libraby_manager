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

    public function deleteborrow($id)
    {
        $sqpl = "DELETE FROM `BorrowOrder` WHERE borrow_id=$id";
        $mysql = $this->conn->prepare($sqpl);
        $mysql->execute();
    }

    public function creatborrow($obj)
    {
        $loan_day = $obj->getLoanDay();
        $pay_day = $obj->getPayDay();
        $sql = "INSERT INTO `BorrowOrder`(`loan_day`, `pay_day`) VALUES ('$loan_day','$pay_day')";
        $mysql = $this->conn->prepare($sql);
        $mysql->execute();
    }

    public function updateborow($id, $loan_day, $pay_day)
    {
        $sql = "UPDATE `BorrowOrder` SET `borrow_id`=[`loan_day`='$loan_day',`pay_day`='$pay_day',` WHERE borrow_id=$id";
        $mysql = $this->conn->prepare($sql);
        $mysql->execute();
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM `BorrowOrder` WHERE borrow_id=$id";
        $mysql = $this->conn->prepare($sql);
        $mysql->execute();
        $mysql->setFetchMode(PDO::FETCH_ASSOC);
        $data = $mysql->fetch();
        if ($data) {
            $borrow = new borrow($data['loan_day'], $data['pay_day']);
            $borrow->borrow_id = $data['borrow_id'];
            return $borrow;
        }
        else{
            echo "Người dùng không tồn tại";
        }

    }
}