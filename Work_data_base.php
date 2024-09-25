<?php

$db = mysqli_connect("localhost", "root", "", "my_first_db");
var_dump($db);

//Проверка на подключение к БД
if (!$db){
    exit('Error');
}

mysqli_set_charset($db, 'utf8mb4');

//функция для лучшего отображения вывода массива
function dump($data){
    echo "<pre>" . print_r($data, 1) . "</pre>", "\n";
}


echo "\n", "------CREATE--------", "\n"; 
/* $res = mysqli_query($db, "INSERT INTO users (name, email) VALUES ('Fye Tiller', 'tiller@mail.com')"); - уже добавлен */

$name = "O'Raily";
$email = 'orailly@mail.com';
/* $name = mysqli_real_escape_string($db, $name);
$res = mysqli_query($db, "INSERT INTO users (name, email) VALUES ('{$name}', '{$email}')"); */

$email2 = "orailly2@mail.com";
/* $exprassion = mysqli_prepare($db, "INSERT INTO users (name, email) VALUE (?, ?)");
$res = mysqli_stmt_execute($exprassion, [$name, $email2]); */


echo "\n", "------SELECT--------", "\n"; 

$stmt = mysqli_prepare($db, "SELECT * FROM users");
if (mysqli_stmt_execute($stmt)){
    $res = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_all($res);
    dump($data);
}



$stmt = mysqli_prepare($db, "SELECT * FROM users");
if (mysqli_stmt_execute($stmt)){
    $res = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($res)){
        echo "<p>ID: {$row['id']} | Name: {$row['name']} | Email: {$row['email']}</p>", "\n";
    }
}
//$row = mysqli_fetch_assoc($res) - Выбирает следующую строку из $res и помещает её в ассоциативный массив $row


echo "\n", "------UPDATE--------", "\n"; 

$stmt = mysqli_prepare($db, "UPDATE users SET name = ? WHERE id = ?");
var_dump(mysqli_stmt_execute($stmt, ['Fye Tiller junior', 3]));//true   
var_dump(mysqli_affected_rows($db)); //int(1)


echo "\n", "------DELETE--------", "\n"; 

$stmt = mysqli_prepare($db, "DELETE FROM users WHERE id = ?");
var_dump(mysqli_stmt_execute($stmt, [5]));
var_dump(mysqli_affected_rows($db));




?>