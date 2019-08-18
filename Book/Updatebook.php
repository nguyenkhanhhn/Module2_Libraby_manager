<?php
include_once '../DBconnect.php';
include_once 'book.php';
include_once 'BookDB.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['book_name']) && !empty($_POST['book_author']) && !empty($_POST['book_producer'])
        && !empty($_POST['book_price'])) {
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $book_name = $_POST['book_name'];
            $book_producer= $_POST['book_producer'];
            $book_author = $_POST['book_author'];
            $book_price = $_POST['book_price'];
            $book = new BookDB();
            $book->update($id,$book_name,$book_author,$book_producer,$book_price);
        }

    }
    header('location: listbook.php', true);
} else {
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $bookdb = new BookDB();
        $book = $bookdb->findByid($id);
        if (is_string($book)) {
            echo $book. '<br>';
            echo '<a href="listbook.php">Trở về</a>';
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
    <h1>Cập nhật thông tin :</h1>
    <form method="post">
        <label> book_id:<?php echo $id?></label><br>
        <label>Tên sách:</label><br>
        <input type="text" name="book_name" value="<?php  echo $book->getBookName()?>"><br>
        <label>Tác giả:</label><br>
        <input type="text" name="book_author" value="<?php  echo $book->getBookAuthor()?>" ><br>
        <label>Nhà sản xuất:</label><br>
        <input type="text" name="book_producer" value="<?php  echo $book->getBookProducer()?>"><br>
        <label>Giá tiền:</label><br>
        <input type="text" name="book_price" value="<?php  echo $book->getBookPrice()?>"><br>
        <input type="submit" value="Cập nhật">
    </form>
</div>
</body>
</html>
