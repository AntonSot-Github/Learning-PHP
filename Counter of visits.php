<?php

$count = file_get_contents("Help_files_PHP/count.txt");

$count += 1;

file_put_contents("Help_files_PHP/count.txt", $count);

setcookie('QuentetyOfEnters', $count);

?>

<?php
//   Teacher's version 

//проверяем, существует ли кука
if (isset($_COOKIE['teacherCount'])) {
    //если существует
    setcookie('teacherCount', ++$_COOKIE['teacherCount'], time() + 3600, '/'); //увеличиваем значение на 1(префиксный инкримент), устанавливаем время жизни куки(1час), распространяем доступ на весь домен
} else {
    //если не существует, создаем куку и присваиваем значение 1
    setcookie('teacherCount', 1, time() + 3600, '/');
}

//То же самое условие с тернарным оператором
//isset($_COOKIE['teacherCount'])) ? setcookie('teacherCount', ++$_COOKIE['teacherCount'], time() + 3600, '/') : setcookie('teacherCount', 1, time() + 3600, '/');

/* Обнуляем счетчик c помощью GET-запроса */
if (isset($_GET['do']) && $_GET['do'] == 'reset'){
    //Удаляем куку
    setcookie('teacherCount', "", time() - 3600, '/');
    //Перенаправляем на ту же страницу
    header('Location: Counter of visits.php');
    die;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Counter of visits</title>
    <style>
        .wrapper{
            width: 50%;
            margin: 0 auto;
        }
        h1{
            font-size: 40px;
            margin-bottom: 20px;
            text-align: center;
        }
        p{
            font-size: 20px;

        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h1>Counter of visits</h1>
        <p>Quentity of visits: <?php echo($_COOKIE['QuentetyOfEnters']) ?></p>
        <a href="Help_files_PHP/setcookie.php">Setcookie</a>
    </div>

    <!-- Teacher's version -->

    <div class="wrapper">
    <p>Quentity of visits: <?php echo($_COOKIE['teacherCount'] ?? 1) ?></p>
    <p><a href="?do=reset">Reset counter</a></p><!-- Создаем GET-запрос для удаления куки -->
    </div>
</body>
</html>

