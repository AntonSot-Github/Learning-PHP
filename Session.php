<?php 

session_start();

$login = "admin";
$password = "est";//после хэширования вместо этого пароля нужно прописать его хэшированную версию

//хэшируем пароль
$hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);


if (!empty($_POST)){
    if($_POST['login'] == $login && password_verify($_POST['password'], $hash)){
        $_SESSION['login'] = 1;
        $_SESSION['name'] = $login;
        //в случае успешного ввода создаем эл-т массива и присваиваем значение, которое будем выводить как сообщение
        $_SESSION['message'] = "Success";
        //в случае успешного ввода перенаправляет на страницу admin.php
        header("Location: Help_files_PHP/admin.php");
        die;
    } else {        
        $_SESSION['message'] = "something wrong";
        //в слкчае неуспешного ввода остаемся на изначальной странице
        header("Location: Session.php");
        die;
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        body{
            width: 100vw;
        }
        a{ 
            margin: 0 auto;
            width: 50%;
            display: block;
            margin-bottom: 30px;
            text-align: left;
        }
        form{
            width: 50%;
            margin: 0 auto;
        }
        p{
            display: block;
            width: 50%;
            margin: 0 auto;
            margin-bottom: 20px;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <a href="Help_files_PHP/admin.php">Admin area</a>

    <?php if(isset($_SESSION['message'])){
            echo "<p>" . $_SESSION['message'] . "</p>";
        }
        //удаляем элемент массива, чтобы сообщение "something wrong" появлялось только раз и исчезало после обновления страницы
        unset($_SESSION['message']);
    ?>

    <form action="" method="post">
        <div class="mb-3">
            <label for="login" class="form-label">Login</label>
            <input type="text" class="form-control" id="login" name="login">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" ></input>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Send</button>
    </form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>