<?php
include_once "../DBconnect.php";
include_once "Student.php";
include_once "Studentdb.php";
if ($_SERVER['REQUEST_METHOD']='GEST'){
    if (isset($_GET['id'])){
        $id=$_GET['id'];
        $new= new Studentdb();
       $studentdetail= $new->detail($id);
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table border="1">
    <tr>
        <th>Student_name</th>
        <th>Student_class</th>
        <th>loan_day</th>
        <th>pay_day</th>
        <th>book_name</th>
        <th>category_name</th>
    </tr>
    <?php foreach ($studentdetail as $value) ?>
    <tr>
        <th><?php echo $value->getStudentName()?></th>
        <th><?php echo $value->getStudentClass()?></th>
        <th><?php echo $value->getLoanDay()?></th>
        <th><?php echo $value->getPayDay()?></th>
        <th><?php echo $value->getBookName()?></th>
        <th><?php echo $value->getCategoryName()?></th>
    </tr>
</table>
</body>
</html>
