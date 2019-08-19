<?php
include_once "../DBconnect.php";
include_once "borrow.php";
include_once "borrowdb.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['loan_day'] && !empty($_POST['pay_day']))) {
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $loan_day = $_POST['loan_day'];
            $pay_day = $_POST['pay_day'];
            $newborrowdb = new borrowdb();
            $newborrowdb->updateborow($id, $loan_day, $pay_day);
        }
        header('location:listborrow.php', true);
    }

} else {
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $newborrow = new borrowdb();
        $borrowdb = $newborrow->findById($id);
        if (is_string($borrowdb)) {
            echo $borrowdb . '<br>';
            echo '<a href="listborrow.php">Trở về</a>';
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
    <h1>Chỉnh sửa phiếu mượn</h1>
    <form method="post">
        <label>Ngày mượn:</label><br>
        <input type="text" name="loan_day" value="<?php echo $borrowdb->getLoanDay() ?>"><br>
        <label>Ngày trả:</label><br>
        <input type="text" name="pay_day" value="<?php echo $borrowdb->getPayDay() ?>"><br>
        <input type="submit" value="Sửa">
    </form>
</div>
</body>
</html>

