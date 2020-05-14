<?php
$comments = [
    [
        "id" => 1,
        "name" => "Карл",
        "comments" => "Комментарий Карла ...",
        "image" => "<img src=\"https://picsum.photos/50\" alt=\"\">" //"https://picsum.photos/50"
    ],
    [
        "id" => 2,
        "name" => "Клаус",
        "comments" => "Комментарий Клауса ...",
        "image" => "<img src=\"https://picsum.photos/50\" alt=\"\">"
    ]
];
?>
<?php //echo $comment['image']; ?>
<!--<img src="https://picsum.photos/50" alt="">-->

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="my.css">

    <title>test-marlin\comments.php</title>
</head>
<body>
<!---->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <!--  Коментарии -->
            <h1>Комментарии</h1>
            <hr>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Комментарии</th>
                    <th>фото</th>
                </tr>
                </thead>
                <tbody>
                <!-- foreach -->
                <?php foreach ($comments as $comment): ?>
                    <tr>
                        <td><?php echo $comment['id']; ?></td>
                        <td><?php echo $comment['name']; ?></td>
                        <td><?php echo $comment['comments']; ?></td>
                        <td><?php echo $comment['image']; ?></td>
                    </tr>
                <?php endforeach; ?>
                <!-- /foreach -->
                </tbody>
            </table>
        </div>
    </div>
</div>
<!---->

<!---->

</body>
</html>
