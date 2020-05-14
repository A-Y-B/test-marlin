<?php
//  $_POST['title']; получает title из формы на edit.php методом post
$title       = $_POST['title'];
$description = $_POST['description'];
//  isset — Определяет, была ли установлена переменная status, если да, то выводит 1, если нет, то выводит 0
$status      = isset($_POST['status']) ? 1 : 0;
$id          = $_POST['id'];

$pdo = new PDO('mysql:host=localhost; dbname=student;', 'root', '');

//  ставим метку - ? , для того что бы не было взломов бд и в ? передаем значение
$sql = "UPDATE products SET title=?, description=?, status=? WHERE id=?";

//  prepare($sql); Подготавливает запрос к выполнению и возвращает связанный с этим запросом объект
$statement = $pdo->prepare($sql);

//  bindValue - передаем значение ( первый параметр - номер первого ключа, сдесь он title )
//  $statement->bindValue(1, $title); кладет $title в первый ключ - title=? в - ? , в запрос -
// "UPDATE products SET title=?, description=?, status=? WHERE id=?";
$statement->bindValue(1, $title);

//  и т.д
$statement->bindValue(2, $description);
$statement->bindValue(3, $status);
$statement->bindValue(4, $id);

//  execute(); выполняет запрос
$statement->execute();

//  header - перенаправляет на страницу /index.php
header("Location: /index.php");
