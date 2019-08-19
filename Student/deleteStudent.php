<?php
include_once "../DBconnect.php";
include_once "Student.php";
include_once "Studentdb.php";
if ($_SERVER['REQUEST_METHOD']='GEST'){
    if (isset($_GET['id'])){
        $id=$_GET['id'];
        $newstudentdb=new Studentdb();
        $newstudentdb->DeleteStudent($id);
    }
    header('location:liststudent.php', true);
}