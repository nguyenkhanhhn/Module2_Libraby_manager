<?php
include_once "../DBconnect.php";
include_once "Category.php";
include_once "CategoryDB.php";
$categorydb= new CategoryDB();
$newCategory= $categorydb->getAll();

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
    <th>STT</th>
    <th>Tên thể loại</th>
</tr>
    <?php foreach ($newCategory as $key=>$value): ?>
    <tr>
        <th><?php echo $key++?></th>
        <th> <?php echo $value->getCategoryName()?></th>
    </tr>
<?php endforeach; ?>
</table>
</body>
</html><?php
