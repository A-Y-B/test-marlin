<?php
//var_dump($_GET);
//  SELECT * FROM users WHERE id = :id   ---   выбрать всё из таблици users где id = :id
//  соединение с базой
$pdo = new PDO('mysql:host=localhost;dbname=student;', "root", "");
//  подготовка запроса, для извлечения из бд инфы
$sql = 'SELECT * FROM products WHERE id=:id';
//  так как в запросе есть переменная, его нужно сперва подготовить, пропустив через метод PDO prepare():
$statement = $pdo->prepare($sql);
//var_dump($statement);die();
//  выполнение запроса
$statement->execute($_GET);
//var_dump($statement);die();
//  fetchAll — Возвращает массив, содержащий все строки результирующего набора
//  FETCH_ASSOC — Извлекает результирующий ряд в виде ассоциативного массива
$product = $statement->fetch(PDO::FETCH_ASSOC);
//var_dump($user);die;
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

    <title>test-marlin/show.php - Просмотр продукта</title>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-8">

            <h1>Просмотр продукта</h1>
            <hr>
            <a href="/index.php" class="btn btn-info">Перейти на главную страницу</a>
            <hr>

            <p>Продукт:  <?php echo $product['title']; ?></p>

            <p>Описание продукта:  <?php echo $product['description']; ?></p>

            <img src="<?php echo $product['image']; ?>" alt="">
        </div>
    </div>
</div>

</body>
</html>

