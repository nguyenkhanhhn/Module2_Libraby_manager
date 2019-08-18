<?php
include_once "../DBconnect.php";
include_once "Category.php";
include_once "CategoryDB.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['category_name'])) {
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $newcategory_name = $_POST['category_name'];
            $category = new CategoryDB();
            $category->Update($id, $newcategory_name);
        }
    }
    header('location:listcategory.php', true);
} else {
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $categorydb = new CategoryDB();
        $newcategory = $categorydb->finById($id);
        if (is_string($newcategory)) {
            echo $newcategory . '<br>';
            echo '<a href="listcategory.php">Trở về</a>';
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
    <h1>Chỉnh sửa thể loại sách</h1>
    <form method="post">
        <label>Tên thể loại:</label><br>
        <input type="text" name="category_name" value="<?php echo$newcategory->getCategoryName()?>"><br>
        <input type="submit" value="Sửa">
    </form>
</div>
</body>
</html>
