<?php

include_once "../DBconnect.php";
include_once "book.php";

class BookDB
{
    public $conn;

    public function __construct()
    {
        $db = new DBconnect();
        $this->conn = $db->connect();
    }

    public function getBook()
    {
     $sql="SELECT * FROM `book`";
        $mysql = $this->conn->prepare($sql);
        $mysql->execute();
        $mysql->setFetchMode(PDO::FETCH_ASSOC);
        $data = $mysql->fetchAll();

        $arr = [];
        foreach ($data as $value) {
            $book = new book($value['book_name'], $value['book_author'], $value['book_producer'], $value['book_price']);
            $book->book_id = $value['book_id'];
            $book->book_category_id=$value['category_name'];
            array_push($arr, $book);
        }
        return $arr;
    }

    public function CreatBook($obj)
    {
        $book_name = $obj->getBookName();
        $book_author = $obj->getBookAuthor();
        $book_producer = $obj->getBookProducer();
        $book_price = $obj->getBookPrice();
        $sql = "INSERT INTO `book`( `book_name`, `book_author`, `book_producer`, `book_price`) 
              VALUES ('$book_name','$book_author','$book_producer','$book_price')";
        $mysql = $this->conn->prepare($sql);
        $mysql->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `book` WHERE book_id=$id";
        $mysql = $this->conn->prepare($sql);
        $mysql->execute();
    }

    public function update($id, $book_name, $book_author, $book_producer, $book_price)
    {
        $sql = "UPDATE `book` SET `book_name`='$book_name',`book_author`='$book_author',`book_producer`='$book_producer',`book_price`='$book_price'WHERE book_id=$id";
        $mysql = $this->conn->prepare($sql);
        $mysql->execute();
    }

    public function findByid($id)
    {
        $sql = "SELECT * FROM `book` WHERE book_id=$id";
        $mysql = $this->conn->prepare($sql);
        $mysql->execute();
        $mysql->setFetchMode(PDO::FETCH_ASSOC);
        $data = $mysql->fetch();
        if ($data) {
            $book = new book($data['book_name'], $data['book_author'], $data['book_producer'], $data['book_price']);
            $book->book_id = $data['book_id'];
            return $book;

        } else {
            return 'Người dùng không tồn tại.';
        }

    }
}


