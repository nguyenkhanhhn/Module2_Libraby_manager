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
}
