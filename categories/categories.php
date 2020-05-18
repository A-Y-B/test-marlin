<?php
// Подключение и выборка с БД
$pdo = new PDO('mysql:host=localhost; dbname=student;', 'root', '');
$sql = 'SELECT * FROM categories';
$statement = $pdo->query($sql);

$categories = $statement->fetchAll(PDO::FETCH_ASSOC);
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

    <title>test-marlin/categories/categories.php - Категории</title>
</head>

<body>
<div class="container">
<div class="row">
<div class="col-md-10">
    <h1>Категории</h1>
    <hr>
    <a href="/index.php" class="btn btn-info">Перейти на главную страницу</a>
    <hr>
    <a href="/categories/create-categories.php" class="btn btn-success">Добавить категорию</a>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Категория</th>
                <th>Действие</th>
            </tr>
        </thead>

        <tbody>
            <!-- PHP foreach -->
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td>
                        <?php echo $category['id']; ?>
                    </td>
                    <td>
                        <a href="/categories/show.php?id=<?php echo $category['id']; ?>"><?php echo $category['title']; ?></a>
                    </td>

                    <td>
                        <a href="/categories/edit.php?id=<?php echo $category['id']; ?>" class="btn btn-warning">Изменить</a>
                        <a href="/categories/delete.php?id=<?php echo $category['id'];?>" class="btn btn-danger" onclick="return confirm('Вы уверены в удалении?')">Удалить</a>
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

