<?php

session_start();

//Если не введен логин(не существует эл-та массива login), клик по ссылке не направит на эту страницу, а оставит на исходной
if(!isset($_SESSION['login'])){
    header("Location: ../Session.php");
    die;
}

if (isset($_GET['do']) && $_GET['do'] == 'logout'){
    unset($_SESSION['login']);
    header("Location: ../Session.php");
    die;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <h1>HELLO, ADMIN </h1>
    <!-- Создаем GET-параметр, чтобы иметь возможность обратиться к элементу массива GET и удалить его для выхода из сессии -->
    <a href="?do=logout">Logout</a>
</body>
</html>