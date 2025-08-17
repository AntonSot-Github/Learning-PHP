<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "hemmy_app";


// Создание соединения
$conn = mysqli_connect($servername, $username, $password, $db);
// Проверка соединения
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>

