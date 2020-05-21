<?php
$title       = $_POST['title'];
$id          = $_POST['id'];

$pdo = new PDO('mysql:host=localhost; dbname=student;', 'root', '');
$sql = "UPDATE categories SET title=? WHERE id=?";

$statement = $pdo->prepare($sql);
$statement->bindValue(1, $title);
$statement->bindValue(2, $id);
$statement->execute();

header("Location: /categories/categories.php");

