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
    <title>test-marlin\index.php</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="my.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1>Мои продукты</h1>
                <a href="create.php" class="btn btn-success">Добавить</a>
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
                                <td><a href="show.php"><?php echo $product['title']; ?></a></td>
                                <td><?php echo $product['description']; ?></td>
                                <td>
                                    <img src="<?php echo $product['image']; ?>" alt="">
                                </td>
                                <td>
                                    <a href="edit.php?id=<?php echo $product['id']; ?>" class="btn btn-warning">Изменить</a>
                                    <a href="#" class="btn btn-danger" onclick="return confirm('Вы уверены в удалении?')">Удалить</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <!-- /PHP foreach -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
