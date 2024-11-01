<?php

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
function registration($name, $password, $email)
{
    global $db;
    $expression = mysqli_prepare($db, "INSERT INTO users (name, password, email) VALUES (?, ?, ?)");
    $res = mysqli_stmt_execute($expression, [$name, $password, $email]);
}
