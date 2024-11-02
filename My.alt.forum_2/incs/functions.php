<?php
require_once __DIR__ . "/../registration.php";
require_once __DIR__ . "/db.php";

function dump($data){
    echo "<pre>" . print_r($data, 1) . "</pre>";
}

//Checking fields of form
$reqFields = ['name11', 'password2', 'email'];
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
// function registration($name, $password, $email): bool
// {
//     global $db;
//     $expression = mysqli_prepare($db, "INSERT INTO users (name, password, email) VALUES (?, ?, ?)");
//     echo $name, ' ', $password, ' ', $email;
//     if (mysqli_stmt_execute($expression, [$name, $password, $email])){
//         echo "Registered";
//         return true;
//     } else {
//         echo 'error';
//         return false;
//     };

// }

function registration($name, $password, $email): bool
{
    global $db;
    // Подготавливаем запрос
    $expression = mysqli_prepare($db, "INSERT INTO users (name, password, email) VALUES (?, ?, ?)");
    if (!$expression) {
        echo 'Error preparing statement: ' . mysqli_error($db);
        return false;
    }
    
    // Привязываем параметры
    mysqli_stmt_bind_param($expression, 'sss', $name, $password, $email); // 'sss' - означает, что все параметры строки

    // Выполняем запрос
    if (mysqli_stmt_execute($expression)) {
        echo "Registered";
        return true;
    } else {
        echo 'Error executing statement: ' . mysqli_stmt_error($expression);
        return false;
    }
}

