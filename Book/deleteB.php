<?php
include_once "../DBconnect.php";
include_once "book.php";
include_once "BookDB.php";
if ($_SERVER['REQUEST_METHOD'] = "GEST") {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $del = new BookDB();
        $del->delete($id);
    }
    header('location: listbook.php', true);
}