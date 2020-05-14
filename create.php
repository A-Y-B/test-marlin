<!-- План действий -->
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
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="my.css">

    <title>test-marlin\create.php</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Добавление продукта</h1>
            <form action="create-store-db.php" method="post">

                <div class="form-group">
                    <label for="">Название</label>
                    <input name="title" type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Описание</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                </div>

<!--                <div class="form-group">-->
<!--                    <label for="">Категория</label>-->
<!--                    <select name="" id="">-->
<!--                        <option value="">Ноутбуки</option>-->
<!--                        <option value="">Телефоны</option>-->
<!--                        <option value="">Новая категория</option>-->
<!--                    </select>-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <label for="">Картинка</label>-->
<!--                    <input type="file">-->
<!--                </div>-->

                <div class="form-group">
                    <label for="">Показывать</label>
                    <input name="status" type="checkbox">
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit">Добавить</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
