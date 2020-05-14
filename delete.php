<?php
/*
1. Получить id
2. Подключиться к БД
3. Сделать запрос в базу на удаление
4. Возвратить пользователя на главную страницу
*/

$id = $_GET['id'];

$pdo = new PDO('mysql:host=localhost; dbname=student;', 'root', '');
$sql = "DELETE FROM products WHERE id = ?";

$statement = $pdo->prepare($sql);
$statement->bindValue(1, $id);
$statement->execute();

header("Location: /index.php");

