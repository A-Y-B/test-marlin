<?php
//  $_POST['title']; получает title из формы на edit.php методом post
$title       = $_POST['title'];
$id          = $_POST['id'];

$pdo = new PDO('mysql:host=localhost; dbname=student;', 'root', '');

//  ставим метку - ? , для того что бы не было взломов бд и в ? передаем значение
$sql = "UPDATE categories SET title=?, WHERE id=?";

//  prepare($sql); Подготавливает запрос к выполнению и возвращает связанный с этим запросом объект
$statement = $pdo->prepare($sql);

//  bindValue - метод передает значение ( первый параметр - номер первого ключа, сдесь он title )
//  $statement->bindValue(1, $title); кладет $title в первый ключ - title=? в - ? , в запрос -
// "UPDATE products SET title=?, description=?, status=? WHERE id=?";

$statement->bindValue(1, $title);

//  execute(); выполняет запрос
$statement->execute();

//  header - перенаправляет на страницу /index.php
header("Location: /index.php");

