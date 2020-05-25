<?php

$pdo = new PDO('mysql:host=localhost;dbname=student;', "root", "");

$sql = 'SELECT * FROM categories WHERE id=:id';

$statement = $pdo->prepare($sql);
$statement->execute($_GET);
$categories = $statement->fetch(PDO::FETCH_ASSOC);


$sql = 'SELECT * FROM products WHERE category_id=:id';
$statement = $pdo->prepare($sql);
$statement->execute($_GET);

$products = $statement->fetchAll(PDO::FETCH_ASSOC);

//var_dump($products);die;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/not/my.css">

    <title>test/show.php - Просмотр категории</title>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-8">

            <h1>Просмотр категории</h1>

            <hr>
            <a href="/index.php" class="btn btn-info">Перейти на главную страницу</a>
            <hr>
            <a href="/categories/categories.php" class="btn btn-success">Перейти в категории</a>
            <hr>

            <h4>Продукты категории - <?php echo $categories['title']; ?></h4>

            <hr>

            <?php foreach ($products as $product): ?>
            <tr>
                <td>
                    <pre><p><?php echo $product['title']; ?></p></pre>
                </td>
            </tr>
            <?php endforeach; ?>

        </div>
    </div>
</div>

</body>
</html>

