<?php
// Подключение и выборка с БД

$pdo = new PDO('mysql:host=localhost; dbname=student;', 'root', '');
$sql = 'SELECT * FROM products';
$statement = $pdo->query($sql);

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

    <title>test-marlin/index.php - Главная</title>
</head>

<body>
<div class="container">
<div class="row">
<div class="col-md-10">
    <h1>Мои продукты</h1>
    <hr>
    <a href="/categories/categories.php" class="btn btn-info">Перейти в категории</a>
    <hr>

    <!-- Кнопка Добавить -->
    <a href="create-index.php" class="btn btn-success">Добавить</a>

    <hr>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Описание</th>
            <th>Картинка</th>
            <th>Действие</th>
        </tr>
        </thead>

        <tbody>
            <!-- PHP foreach -->
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product['id']; ?></td>

                    <!-- Ссылка на продукт в названии продукта -->
                    <td><a href="show.php?id=<?php echo $product['id']; ?>"><?php echo $product['title']; ?></a></td>

                    <td><?php echo $product['description']; ?></td>

                    <td>
                        <img src="<?php echo $product['image']; ?>" alt="">
                    </td>

                    <!-- Кнопки -->
                    <td>
                        <!-- Кнопка Изменить -->
                        <a href="edit.php?id=<?php echo $product['id']; ?>" class="btn btn-warning">Изменить</a>

                        <!-- Кнопка Удалить -->
                        <a href="delete.php?id=<?php echo $product['id'];?>" class="btn btn-danger" onclick="return confirm('Вы уверены в удалении?')">Удалить</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <!-- /PHP foreach -->
        </tbody>
    </table>
</div> <!-- /<div class="col-md-10"> -->
</div> <!-- /<div class="row"> -->
</div> <!-- /<div class="container"> -->
</body>
</html>
