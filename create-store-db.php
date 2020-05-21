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

$category_id = $_POST['category_id'];
//var_dump($category_id);die();

// проверяем, если картинка загружена, то сохраняем название в БД, если нет то в БД храним null
$image = null;
if (is_uploaded_file($_FILES['image']['tmp_name'])) { // проверяем загрузили картинку или нет
    // если загружена, то переписываем название файла
    $image = $_FILES['image']['name'];
    // загружаем файл, указваем где сейчас картинка и куда загружаем в папку - uploads
    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image);
}
//

$pdo = new PDO('mysql:host=localhost; dbname=student;', 'root', '');

$sql = "INSERT INTO products (title, description, status, image, category_id) VALUES (:title, :description, :status, :image, :category_id)";

$statement = $pdo->prepare($sql);
$statement->execute([
    'title' => $title,
    'description' => $description,
    'status' => $status,
    'image' => $image,
    'category_id' => $category_id
]);
//var_dump($statement);die();

//  Сохранение картинки в папку - uploads
$name = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];

move_uploaded_file($tmp_name, "uploads/" . $name);

header("Location: /index.php");
