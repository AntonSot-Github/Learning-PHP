<?php

$db_config = [
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
    'db_name' => 'guestsbook',
];

//Указываем, в каком формате нам будут отдавать данные из БД
$db_options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

//Вариант подключения к БД
$dsn = "mysql:dbname={$db_config['db_name']};host={$db_config['host']};charset=utf8";

//Строка подключения к БД
$dbh = new PDO($dsn, $db_config['user'], $db_config['password'], $db_options);
