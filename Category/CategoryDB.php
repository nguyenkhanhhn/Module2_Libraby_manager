<?php

include_once "../DBconnect.php";
include_once "Category.php";

class CategoryDB
{
    public $conn;

    public function __construct()
    {
        $db = new DBconnect();
        $this->conn = $db->connect();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM `categorys`";
        $mysql = $this->conn->prepare($sql);
        $mysql->execute();
        $mysql->setFetchMode(PDO::FETCH_ASSOC);
        $data = $mysql->fetchAll();
        $arr = [];
        foreach ($data as $value) {
            $category = new Category($value['category_name']);
            $category->category_id = $value['category_id'];
            array_push($arr, $category);
        }
        return $arr;

    }

    public function Creat($obj)
    {
        $cateogy_name = $obj->getCategoryName();
        $sql = "INSERT INTO `categorys`(`category_name`) VALUES ('$cateogy_name')";
        $mysql = $this->conn->prepare($sql);
        $mysql->execute();
    }

    public function Delete($id)
    {
        $sql = "DELETE FROM `categorys` WHERE category_id=$id";
        $mysql = $this->conn->prepare($sql);
        $mysql->execute();
    }

    public function Update($id, $category_name)
    {
        $sql = "UPDATE `categorys` SET `category_name`='$category_name' WHERE category_id=$id";
        $mysql = $this->conn->prepare($sql);
        $mysql->execute();
    }

    public function finById($id)
    {
        $sql = "SELECT * FROM `categorys` WHERE category_id=$id";
        $mysql = $this->conn->prepare($sql);
        $mysql->execute();
        $mysql->setFetchMode(PDO::FETCH_ASSOC);
        $data = $mysql->fetch();
        if ($data) {
            $category = new Category($data['category_name']);
            $category->category_id = $data['category_id'];
            return $category;
        } else {
            echo "Người dùng không tồn tại";
        }

    }

}
