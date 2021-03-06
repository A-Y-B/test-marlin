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

$sql = 'SELECT * FROM categories';
$statement = $pdo->query($sql);
$categories = $statement->fetchAll(PDO::FETCH_ASSOC);

//var_dump($product);die();
?>


<!--<!doctype html>-->
<HTML LANG="EN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="not/my.css">

    <title>test-marlin/edit.php - Изменить</title>
</head>


<body>
<div class="container">
<div class="row">
<div class="col-md-6">
    <h1>Изменение продукта</h1>
    <!-- form -->
    <form action="edit-update-db.php" method="post" enctype="multipart/form-data">

        <!-- input name="title" -->
        <div class="form-group">
            <h5>Название</h5>

            <input name="title" type="text" class="form-control" value="<?php echo $product['title']; ?>">
        </div>

        <!-- textarea name="description" -->
        <div class="form-group">
            <H5>Описание</H5>

            <textarea name="description" class="form-control" id="" cols="30" rows="10"><?php echo $product['description']; ?></textarea>
        </div>

        <!-- categories -->
        <div class="form-group">
            <H5>Категории</H5>
            <select name="category_id" class="form-control">

                <!-- foreach -->
                <?php foreach ($categories as $category): ?>

                    <option value="<?php echo $category['id']; ?>" <?php echo $category['id'] == $product['category_id'] ? 'selected' : ''; ?>><?php echo $category['title']; ?></option>

                <?php endforeach; ?>
            </select>
        </div>

        <!-- name="image"-->
        <div class="form-group">
            <H5>Картинка</H5>
            <input name="image" type="file">
        </div>
        <div class="form-group">
            <img src="uploads/<?php echo $product['image']; ?>" width="200" alt="">
        </div>

        <!-- name="status" -->
        <div class="form-group">
            <H5>Показывать</H5>
            <input name="status" type="checkbox" <?php echo $product['status'] == 1 ? 'checked' : ''; ?>>
        </div>

        <!-- input type="hidden" name="id" -->
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">

        <!-- button -->
        <div class="form-group">
            <button class="btn btn-warning">Изменить</button>
        </div>
    </form>
</div> <!-- /<div class="col-md-6"> -->
</div> <!-- /<div class="row"> -->
</div> <!-- /<div class="container"> -->

</body>
</html>

