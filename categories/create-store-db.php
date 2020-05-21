<?php

/*
1. Создать обработчик create-store-db.php
   1.1 Настроить форму
       1.1.1 Заполнить атрибут action
       1.1.2 Заполнить атрибут name у инпутов
       1.1.3 Выставить тип submit у кнопки
       1.1.4 Метод запроса должен быть post
2. Сформировать запрос
3. Подключиться
4. Выполнить запрос
5. Подставить данные в запрос
6. Переадресация пользователя на главную - categories.php
*/

$title = $_POST['title'];

$pdo = new PDO('mysql:host=localhost; dbname=student;', 'root', '');

$sql = 'INSERT INTO categories (title) VALUES (:title)';

$statement = $pdo->prepare($sql);
$statement->execute([
    'title' => $title,
]);

header("Location: /categories/categories.php");