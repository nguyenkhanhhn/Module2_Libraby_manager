<?php
include_once "../DBconnect.php";
include_once "borrow.php";
include_once "borrowdb.php";
$list= new borrowdb();
$listborrow=$list->getborrow()
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
    <h1 style="margin-left: 200px">ListBorrowOrder</h1>
    <tr>
        <th>STT</th>
        <th>loan_day</th>
        <th>pay_day</th>
    </tr>
    <?php foreach ($listborrow as $key=> $value): ?>
        <tr>
            <th><?php echo $key++ ?></th>
            <th><?php echo  $value->getLoanDay()?></th>
            <th><?php echo $value->getPayDay()?></th>
            <th>
                <span><a href="deleteborrow.php?id=<?php echo $value->getBorrowId()?>">Delete</a></span>
                <span><a href="updateborrow.php?id=<?php echo $value->getBorrowId()?>">Update</a></span>

            </th>
        </tr>
    <?php endforeach; ?>
</table>
<span><a href="creatborrow.php">Add new borroworder</a></span>
</body>
</html>