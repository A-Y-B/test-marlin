<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/my.css">
</head>
<body>
<div class="container form">
    <div class="row">
        <div class="col-md-6">

            <!-- action="pdo.php" -->
            <form action="pdo.php" method="post">

                    <!--  name="name" -->
<!--                    <div class="form-group">-->
<!--                        <label for="formGroupExampleInput">Введите своё имя</label>-->
<!--                        <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Имя">-->
<!--                    </div>-->

                    <!-- name="email"-->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Введите свой email</label>

                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">

                        <small id="emailHelp" class="form-text text-muted">Мы никогда не передадим вашу электронную почту кому-то еще.</small>
                    </div>
                    <!-- name="password"-->
<!--                    <div class="form-group form-group-bottom">-->
<!--                        <label for="exampleInputPassword1">Введите свой пароль</label>-->
<!---->
<!--                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль">-->
<!--                    </div>-->

                    <button type="submit" class="btn btn-primary">Отправить</button>

            </form>

        </div><!-- col-md-6-->
    </div>
</div>

</body>
</html>
