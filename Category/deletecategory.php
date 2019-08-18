<?php
include_once "../DBconnect.php";
include_once "Category.php";
include_once "CategoryDB.php";
if ($_SERVER['REQUEST_METHOD']='GEST'){
    if (isset($_GET['id'])){
        $id=$_GET['id'];
        $categorydb= new CategoryDB();
        $categorydb->Delete($id);
    }
    header('location:listcategory.php', true);
}