<?php
//var_dump($_POST);die();
//var_dump($_FILES['image']);die();

$title = $_POST['title'];
$description = $_POST['description'];
$status = isset($_POST['status']) ? 1 : 0;
// или так
/*
if (isset($_POST['status'])) {
    return 1;
}else {
    return 0;
}
*/
//var_dump($status);die();

$categories_id = $_POST['categories'];
//var_dump($categories_id);die();


$image = null;
if (is_uploaded_file($_FILES['image']['tmp_name'])) {
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image);
}

$pdo = new PDO('mysql:host=localhost; dbname=student;', 'root', '');

$sql = 'INSERT INTO products (title, description, status, image) VALUES (:title, :description, :status, :image)';

$statement = $pdo->prepare($sql);
$statement->execute([
    'title' => $title,
    'description' => $description,
    'status' => $status,
    'image' => $image
]);

//var_dump($statement);die();

//  Сохранение картинки в папку - uploads
$name = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];

move_uploaded_file($tmp_name, "uploads/" . $name);

//var_dump($statement);die();
header("Location: /index.php");
