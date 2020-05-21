<!--
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
-->
<!-- Загрузка картинки -->
<!--
1. Создать форму для отправки картинки
2. Дописать скрипт который будет обрабатывать форму в файле create-store-db.php
    2.1 Сгенерировать новое название для картинки
    2.2 Сохранить картинку в папку uploads
-->

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

    <title>test-marlin/create.php - Добавить</title>

</head>

<body>
<div class="container">
<div class="row">
<div class="col-md-6">
    <h1>Добавление продукта</h1>
    <hr>
    <a href="/index.php" class="btn btn-info">Перейти на главную страницу</a>
    <hr>
    <!-- form -->
    <form action="create-store-db.php" method="post" enctype="multipart/form-data">
        <!-- title -->
        <div class="form-group">
            <label for="">Название</label>

            <input name="title" type="text" class="form-control">
        </div>
        <!-- description -->
        <div class="form-group">
            <label for="">Описание</label>

            <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
        </div>

        <!-- categories -->
        <div class="form-group">
            <label for="">Категории</label>
            <select name="category_id" class="form-control">

                <!-- foreach -->
                <?php foreach ($categories as $category): ?>

                    <option value="<?php echo $category['id']; ?>"><?php echo $category['title']; ?></option>

                <?php endforeach; ?>
            </select>
        </div>

        <!-- image-->
        <div class="form-group">
            <label for="">Картинка</label>

            <input name="image" type="file">
        </div>

        <!-- checkbox -->
        <div class="form-group">
            <label for="">Показывать</label>

            <input name="status" type="checkbox">
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
