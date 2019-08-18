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
    <h1>Thêm sách vào thư viện</h1>
    <form method="post">
        <label>Tên sách:</label><br>
        <input type="text" name="book_name"><br>
        <label>Tác giả:</label><br>
        <input type="text" name="book_author"><br>
        <label>Nhà sản xuất:</label><br>
        <input type="text" name="book_producer"><br>
        <label>Giá tiền</label><br>
        <input type="text" name="book_price"><br>
        <input type="submit" value="Nhập sách">
    </form>
</div>
</body>
</html>
<?php
include_once '../DBconnect.php';
include_once 'book.php';
include_once 'BookDB.php';
if ($_SERVER['REQUEST_METHOD'] = 'POST') {
    if (!empty($_POST['book_name']) && !empty($_POST['book_author']) && !empty($_POST['book_producer'])
        && !empty($_POST['book_price'])) {
        $book_name = $_POST['book_name'];
        $book_author= $_POST['book_author'];
        $book_producer = $_POST['book_producer'];
        $book_price = $_POST['book_price'];

        $book = new book($book_name,$book_author,$book_producer,$book_price);
        $bookdb= new BookDB();
        $bookdb->CreatBook($book);
        header('location:listbook.php', true);
    }
}
?>
