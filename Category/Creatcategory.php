<?php
include_once "../DBconnect.php";
include_once "Category.php";
include_once "CategoryDB.php";
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
        <h1>Thêm thể loại sách vào thư viện</h1>
        <form method="post">
            <label>Tên thể loại:</label><br>
            <input type="text" name="category_name"><br>
            <input type="submit" value="Thêm">
        </form>
    </div>
    </body>
    </html>
<?php
if ($_SERVER['REQUEST_METHOD'] = 'POST') {
    if (!empty($_POST['category_name'])) {
        $category_name = $_POST['category_name'];
        $category = new Category($category_name);
        $categorydb = new CategoryDB();
        $categorydb->Creat($category);
        header('location:listcategory.php', true);
    }
}

?>