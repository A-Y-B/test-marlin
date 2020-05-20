<!--
0. Получить id записи
1. Вытащить определенную запись по id из таблици
2. Подставить актуальные значения в форму
3. Настроить форму
-->

<?php

$id = $_GET['id'];

$pdo = new PDO('mysql:host=localhost; dbname=student;', 'root', '');
$sql = "SELECT * FROM products WHERE id = ?";

$statement = $pdo->prepare($sql);
$statement->bindValue(1, $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);

//var_dump($product);die();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="not/my.css">

    <title>test-marlin\edit.php - Изменить</title>
</head>


<body>
<div class="container">
<div class="row">
<div class="col-md-6">

    <!-- ФОРМА -->
    <form action="edit-update-db.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <h1>Изменение продукта</h1>
            <h5>Название</h5>

            <!-- input name="title" -->
            <input name="title" type="text" class="form-control" value="<?php echo $product['title']; ?>">
        </div>

        <div class="form-group">
            <label for="">Описание</label>

            <!-- textarea name="description" -->
            <textarea name="description" class="form-control" id="" cols="30" rows="10"><?php echo $product['description']; ?></textarea>
        </div>

        <!-- image-->
        <div class="form-group">
            <label for="">Картинка</label>

            <input name="image" type="file">
        </div>
        <div class="form-group">

            <img src="uploads/<?php echo $product['image']; ?>" alt="">
        </div>

        <div class="form-group">
            <label for="">Показывать</label>

            <!-- input name="status" -->
            <input name="status" type="checkbox" <?php echo $product['status'] == 1 ? 'checked' : ''; ?>>
        </div>

        <!-- input type="hidden" name="id" -->
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">

        <div class="form-group">
            <button class="btn btn-warning">Изменить</button>
        </div>
    </form>
</div> <!-- /<div class="col-md-6"> -->
</div> <!-- /<div class="row"> -->
</div> <!-- /<div class="container"> -->

</body>
</html>

