<?php
session_start();
require_once __DIR__ . "/db.php";

function dump($data){
    echo "<pre>" . print_r($data, 1) . "</pre>";
}

//Checking fields of form
$reqFields = ['name', 'password', 'email'];
function checkField(array $reqFields, $post = true): array
{
    $arrData = ($post) ? $_POST : $_GET;
    $checkedData = [];
    foreach ($reqFields as $field){
        if ($arrData[$field]){
            $checkedData[$field] = trim(strip_tags($arrData[$field]));
        } else {
            $checkedData[$field] = '';
        }
    }
    return $checkedData; 
}

//Checking length and presence of only numbers in name and password
function checkNaPa($data): bool 
{
    if ((strlen($data) <= 2 || strlen($data) > 25 || ctype_digit($data))){
        return false;
    } else {
        return true;
    }

}

//registration of new user
 function registration($name, $password, $email): bool
 {
     global $db;
     $expression = mysqli_prepare($db, "INSERT INTO users (name, password, email) VALUES (?, ?, ?)");

     if (mysqli_stmt_execute($expression, [$name, $password, $email])){
        $_SESSION['success_reg'] = 'You have successfully registered!';
        header("Location: login.php");
        return true;
     } else {
        return false;
     };

 }

//Autorization
function login($name, $logPass)
{
    global $db;    
    // Подготавливаем SQL-запрос для выбора пользователя по имени
    $stmt = mysqli_prepare($db, "SELECT * FROM `users` WHERE name = ?");
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    // Извлекаем данные пользователя
    $user = mysqli_fetch_assoc($res);

    // Проверяем пароль
    if (!password_verify($logPass, $user['password'])){
        $_SESSION['error_log'] = 'uncorrect name or password';
        return false;
    } else {
        $_SESSION['success_reg'] = 'oki';
        return true;
    }

}

