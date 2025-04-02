<?php


try {
    $dsn = "mysql:host=localhost;dbname=db_Alena;charset=utf8mb4";
    $user = "root";
    $password = "";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Режим обработки ошибок
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Ассоциативные массивы
    ];

    $pdo = new PDO($dsn, $user, $password, $options);
    //echo "Подключение успешно!";
} catch (PDOException $e) {
    echo "Ошибка подключения: " . $e->getMessage();
}