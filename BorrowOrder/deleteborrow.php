<?php
include_once "../DBconnect.php";
include_once "borrow.php";
include_once "borrowdb.php";
if ($_SERVER['REQUEST_METHOD']='GEST'){
    if (isset($_GET['id'])){
        $id=$_GET['id'];
        $newborrowdb= new borrowdb();
        $newborrowdb->deleteborrow($id);
    }
    header('location:listborrow.php', true);
}