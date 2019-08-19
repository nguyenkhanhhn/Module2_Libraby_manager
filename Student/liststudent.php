<?php
include_once "../DBconnect.php";
include_once "Student.php";
include_once "Studentdb.php";
$list= new studentdb();
$liststudent= $list->getstudent();
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
<table border="1" >
    <h1 style="margin-left: 200px">ListStudent</h1>
    <tr>
        <th>STT</th>
        <th>student_name</th>
        <th>student_class</th>
        <th>student_address</th>
        <th>student_bird_day</th>
        <th>student_phone</th>
    </tr>
    <?php foreach ($liststudent as $key=> $value): ?>
        <tr>
            <th><?php echo $key++ ?></th>
            <th><?php echo  $value->getStudentName()?></th>
            <th><?php echo $value->getStudentClass()?></th>
            <th><?php echo $value->getStudentAddress() ?></th>
            <th><?php echo $value->getStudentBirdDay() ?></th>
            <th><?php echo $value->getStudentPhone() ?></th>
            <th>
                <span><a href="deleteStudent.php?id=<?php echo $value->getStudentId()?>">Delete</a></span>
                <span><a href="updatestudent.php?id=<?php echo $value->getStudentId()?>">Update</a></span>

            </th>
        </tr>
    <?php endforeach; ?>
</table>
<span><a href="CreatStudent.php">Add new student</a></span>
</body>
</html>