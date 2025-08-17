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

$sql = "CREATE TABLE IF NOT EXISTS users(
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL
)";

$stmt = mysqli_prepare($conn, $sql);
if(!$stmt){
  die("Error in preparing of query: " . mysqli_connect_error());
}


$res = mysqli_stmt_execute($stmt);
if(!$res){
  die("Error executing query: " . mysqli_connect_error());
} else {
  mysqli_stmt_close($stmt);
}



//CREATE DATABASE IF NOT EXISTS hemmy_app;
?>

