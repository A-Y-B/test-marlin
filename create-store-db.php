<?php
//var_dump($_POST);die();

$title = $_POST['title'];
$description = $_POST['description'];
$status = isset($_POST['status']) ? 1 : 0;
// или так
/*if (isset($_POST['status'])) {
    return 1;
}else {
    return 0;
}*/

//var_dump($status);die();

$pdo = new PDO('mysql:host=localhost; dbname=student;', 'root', '');
$sql = 'INSERT INTO products (title, description, status) VALUES (:title, :description, :status)';
$statement = $pdo->prepare($sql);
$statement->execute([
    'title'       => $title,
    'description' => $description,
    'status'      => $status
]);
//var_dump($statement);die();

header("Location: /index.php");
