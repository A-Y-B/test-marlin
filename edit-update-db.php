<?php

$title       = $_POST['title'];
$description = $_POST['description'];

$status      = isset($_POST['status']) ? 1 : 0;
$id          = $_POST['id'];

$pdo = new PDO('mysql:host=localhost; dbname=student;', 'root', '');
$sql = "UPDATE products SET title=?, description=?, status=? WHERE id=?";

$statement = $pdo->prepare($sql);

$statement->bindValue(1, $title);
$statement->bindValue(2, $description);
$statement->bindValue(3, $status);
$statement->bindValue(4, $id);

$statement->execute();

header("Location: /index.php");
