<?php

$servername = "localhost";
$username = "root";
$password = "";


// Создание соединения
$conn = mysqli_connect($servername, $username, $password);

// Проверка соединения
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Успешное подключение к базе данных!";

//CREATE DATABASE IF NOT EXISTS hemmy_app;
?>
