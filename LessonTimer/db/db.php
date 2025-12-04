<?php

$db_config = [
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
    'db_name' => 'lesson_timer'
];

$db_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Автоматически выбрасывать исключения при ошибках SQL
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // По умолчанию получать данные в виде ассоциативного массива
];

$dsn = "mysql:dbname={$db_config['db_name']};host={$db_config['host']};charset=utf8";

$db = new PDO($dsn, $db_config['user'], $db_config['password'], $db_options);

