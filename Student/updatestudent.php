<?php
include_once '../DBconnect.php';
include_once 'Student.php';
include_once 'Studentdb.php';
if ($_SERVER['REQUEST_METHOD'] = 'POST') {
    if (!empty($_POST['student_name']) && !empty($_POST['student_class']) && !empty($_POST['student_address'])
        && !empty($_POST['student_bird_day']) && !empty($_POST['student_phone'])) {
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $student_name = $_POST['student_name'];
            $student_class = $_POST['student_class'];
            $student_address = $_POST['student_address'];
            $student_bird_day = $_POST['student_bird_day'];
            $student_phone = $_POST['student_phone'];
            $newstudentdb = new Studentdb();
            $newstudentdb->UpdateStudent($id, $student_name, $student_class, $student_address, $student_bird_day, $student_phone);

        }
        header('location:liststudent.php', true);
    }

} else {
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $newstudentdb = new Studentdb();
        $student = $newstudentdb->findById($id);
        if (is_string($student)) {
            echo $student . '<br>';
            echo '<a href="liststudent.php">Trở về</a>';
            die();
        }
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
    <style type="text/css">
        #creat {
            width: 480px;
            height: auto;
            margin: 0 auto;
            padding: 0 30px 20px;
            background: white;
            border: 2px solid navy;
        }

        #creat h1 {
            color: navy;
            margin: 20px auto;
        }

        #creat input {
            margin: 5px auto;
        }

        #creat label {
            color: navy;
        }
    </style>
</head>
<body>
<div id="creat">
    <h1>Thêm danh sách sinh viên</h1>
    <form method="post">
        <label>Tên sinh viên:</label><br>
        <input type="text" name="student_name"><br>
        <label>Lớp:</label><br>
        <input type="text" name="student_class"><br>
        <label>Địa chỉ:</label><br>
        <input type="text" name="student_address"><br>
        <label>Ngày sinh</label><br>
        <input type="text" name="student_bird_day"><br>
        <label>Phone</label><br>
        <input type="text" name="student_phone"><br>
        <input type="submit" value="Nhập dữ liệu">
    </form>
</div>
</body>
</html>

