<?php
/*
1. Создать обработчик create-store-db.php
    1.1 Настроить форму
        1.1.1 Заполнить атрибут action
        1.1.2 Метод запроса должен быть post
        1.1.3 Заполнить атрибут name у ипутов
        1.1.4 Выставить тип submit у кнопки
2. Сформировать запрос
3. Подключиться к бд
4. Выполнить запрос
5. Подставить данные в запрос
6. Переадресация пользователя на главную

   Загрузка картинки

1. Создать форму для отправки картинки
2. Дописать скрипт который будет обрабатывать форму в файле create-store-db.php
    2.1 Сгенерировать новое название для картинки
    2.2 Сохранить картинку в папку uploads
*/
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

    <title>test-marlin/create.php - Добавить</title>

</head>

<body>
<div class="container">
<div class="row">
<div class="col-md-6">

    <h1>Добавление категории</h1>
    <hr>
    <a href="/index.php" class="btn btn-info">Перейти на главную страницу</a>
    <hr>
    <a href="/categories/categories.php" class="btn btn-secondary">Перейти на страницу - Категории</a>
    <hr>

    <!-- form -->
    <form action="create-store-db.php" method="post" enctype="multipart/form-data">
        <!-- title -->
        <div class="form-group">
            <h5>Название</h5>
            <!-- <label for="">Название</label>-->

            <input name="title" type="text" class="form-control">
        </div>

        <!-- btn -->
        <div class="form-group">

            <button class="btn btn-success" type="submit">Добавить</button>
        </div>
    </form>
</div>
</div>
</div>

</body>
</html>

