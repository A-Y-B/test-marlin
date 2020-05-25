<?php
//  $_POST['title']; получает title из формы на edit.php методом post
$title       = $_POST['title'];
$description = $_POST['description'];
//  isset — Определяет, есть ли переменная status, если да, то выводит 1, если нет, то выводит 0
$status      = isset($_POST['status']) ? 1 : 0;
$category_id = $_POST['category_id'];
$id          = $_POST['id'];


$pdo = new PDO('mysql:host=localhost; dbname=student;', 'root', '');

//  ставим метку - ? , для того что бы не было взломов бд и в ? передаем значение
$sql = "UPDATE products SET title=?, description=?, status=?, category_id=? WHERE id=?";

//  prepare($sql); Подготавливает запрос к выполнению и возвращает связанный с этим запросом объект
$statement = $pdo->prepare($sql);

//  bindValue - метод передает значение ( первый параметр - номер первого ключа, сдесь он title )
//  $statement->bindValue(1, $title); кладет $title в первый ключ - title=? в - ? , в запрос -
// "UPDATE products SET title=?, description=?, status=? WHERE id=?";
$statement->bindValue(1, $title);
$statement->bindValue(2, $description);
$statement->bindValue(3, $status);
$statement->bindValue(4, $category_id);
$statement->bindValue(5, $id);

//  execute(); выполняет запрос
$statement->execute();

if (is_uploaded_file($_FILES['image']['tmp_name'])) { // проверяем загрузили картинку или нет
    // если загружена, то переписываем название файла
    $image = $_FILES['image']['name'];

    $sql = "SELECT * FROM products WHERE id = ?";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $id);
    $statement->execute();
    $product = $statement->fetch(PDO::FETCH_ASSOC);

    if (is_file('uploads/' . $product['image'])) {
        unlink("uploads/" . $product['image']);
    }

    // загружаем файл, указваем где сейчас картинка и куда загружаем в папку - uploads
    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image);

    $sql = "UPDATE products SET image=? WHERE id=?";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $image);
    $statement->bindValue(2, $id);
    $statement->execute();
}

//  header - перенаправляет на страницу /index.php
header("Location: /index.php");















