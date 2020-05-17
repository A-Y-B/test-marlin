<?php
//  $users ассоциативный массив

//    $users = [
//        [
//            "id" => 1,
//            "name" => "Jame Doe",
//            "email" => "jane@example.com"
//        ],
//        [
//            "id" => 2,
//            "name" => "John",
//            "email" => "john@example.com"
//        ],
//    ];

//  1. Нужно подготовить хранилище( массив, а потом подключимся к базе )
//  2. Вывести список данных используя foreach

//  1. Соединиться с базой
//  2. Сделать запрос select
//  3. Получить результат
//  4. Получить данные в переменную $users


$pdo = new PDO('mysql:host=localhost; dbname=test;', "root", "");
$statement = $pdo->prepare("SELECT * FROM users");
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_ASSOC);
//var_dump($users);die;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>test/select.php</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="my.css">
</head>

<body>
    <div class="container">
    <h1>Users</h1>
    <a href="#" class="btn btn-success">Create</a>
    <hr>
    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    <!-- PHP foreach -->
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['name']; ?></a></td>
                            <td><?php echo $user['email']; ?></td>

                            <td>
                                <a href="#" class="btn btn-info">Show</a>
                                <a href="#" class="btn btn-warning">Edit</a>
                                <a href="#" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <!-- /PHP foreach -->
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>

