<?php

//var_dump ($_POST);die();

$driver = 'mysql'; // тип базы данных, с которой мы будем работать

$host = 'localhost';// альтернатива '127.0.0.1' - адрес хоста, в нашем случае локального

$db_name = 'blog'; // имя базы данных

$db_user = 'root'; // имя пользователя для базы данных

$db_password = ''; // пароль пользователя

$charset = 'utf8'; // кодировка по умолчанию

$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

//  формируем строку DSN соединение
$dsn = "$driver:host=$host;dbname=$db_name;charset=$charset";


//  Подключаемся к БД создаем обьект
$pdo = new PDO($dsn, $db_user, $db_password, $options);

//  С помощью данного SQL запроса SELECT выбираются все значения из таблицы
//  В $sql = Выбрать всё из таблици connect из поля емейл
$sql = "SELECT * FROM connect where email = :email";
//var_dump($statement);die();


//  prepare — Подготавливает запрос к выполнению и возвращает связанный с этим запросом объект
$statement = $pdo->prepare($sql);
//var_dump($statement);die();


//$data = $_POST['email'];
//var_dump($data);die();


// execute - Запускает подготовленный запрос на выполнение
$statement->execute($_POST);
//var_dump($statement);die();

//  Если выполнялся запрос на получение данных из базы, как в нашем случае, то следующим шагом можно их извлечь.
//  Два самых наиболее часто используемых методов - это fetch() и fetchAll()
//  fetchAll — Возвращает массив, содержащий все строки результирующего набора
//  FETCH_ASSOC — Извлекает результирующий ряд в виде ассоциативного массива
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

// var_dump($result);

