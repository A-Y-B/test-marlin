<?php
/*
1. В файле index.php прописываем правельную ссылку на файл обработчик - delete.php?id=<?php echo $product['id'];?>
2. Получить id
3. Подключиться к БД
4. Сделать запрос в базу на удаление
5. Возвратить пользователя на главную страницу
*/

$id = $_GET['id'];

$pdo = new PDO('mysql:host=localhost; dbname=student;', 'root', '');

$sql = "SELECT * FROM products WHERE id = ?";
$statement = $pdo->prepare($sql);
$statement->bindValue(1, $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);

if (is_file('uploads/' . $product['image'])) {
    unlink("uploads/" . $product['image']);
}


$sql = "DELETE FROM products WHERE id = ?";

$statement = $pdo->prepare($sql);
$statement->bindValue(1, $id);
$statement->execute();

header("Location: /index.php");

