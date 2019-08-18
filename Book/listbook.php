<?php
include_once "../DBconnect.php";
include_once "book.php";
include_once "BookDB.php";
$list= new BookDB();
$listbook= $list->getBook();
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
    <h1 style="margin-left: 200px">ListBook</h1>
    <tr>
        <th>STT</th>
        <th>book_name</th>
        <th>book_author</th>
        <th>book_producer</th>
        <th>book_price</th>
        <th>category_id</th>
    </tr>
    <?php foreach ($listbook as $key=>$value): ?>
    <tr>
        <th><?php echo $key++ ?></th>
        <th><?php echo  $value->getBookName()?></th>
        <th><?php echo $value->getBookAuthor() ?></th>
        <th><?php echo $value->getBookProducer() ?></th>
        <th><?php echo $value->getBookPrice() ?></th>
        <td>
            <span><a href="deleteB.php?id=<?php echo $value->getBookId()?>">Delete</a></span>
            <span><a href="Updatebook.php?id=<?php echo $value->getBookId()?>">Update</a></span>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<span><a href="creat_new_book.php">Add new book</a></span>
</body>
</html>