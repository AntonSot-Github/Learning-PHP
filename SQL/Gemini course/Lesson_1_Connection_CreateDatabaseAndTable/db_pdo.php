<?php

// Конфигурация подключения к базе данных
$db_config = [
    'host' => 'localhost',      // Сервер базы данных (обычно localhost для XAMPP)
    'user' => 'root',           // Имя пользователя БД (по умолчанию в XAMPP — root)
    'password' => '',           // Пароль (по умолчанию в XAMPP пустой)
    'db_name' => 'pdo_hemmy_app', // Имя базы данных, к которой подключаемся
];

// Настройки PDO для удобства и безопасности
$db_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Автоматически выбрасывать исключения при ошибках SQL
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // По умолчанию получать данные в виде ассоциативного массива
];

// Формируем DSN (Data Source Name) — строку подключения к БД
// mysql: — указываем драйвер (для MySQL/MariaDB)
// dbname= — имя базы данных
// host= — адрес сервера
// charset=utf8 — кодировка соединения
$dsn = "mysql:dbname={$db_config['db_name']};host={$db_config['host']};charset=utf8";

// Пробуем подключиться к БД
try {
    // Создаём объект PDO — соединение с базой данных
    // Передаём параметры: DSN, логин, пароль и настройки
    $db = new PDO($dsn, $db_config['user'], $db_config['password'], $db_options);
    
    // Если подключение успешно — выводим сообщение
    echo "Всё работает! Подключение к БД успешно.";

} catch (PDOException $e) {
    // Если возникла ошибка — ловим исключение и выводим сообщение
    die("Ошибка подключения: " . $e->getMessage());
}

// Теперь переменная $db готова для выполнения SQL-запросов
// Например: $db->query("SELECT * FROM users");

$sql = "CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL
)";

try {
    // Используем метод exec() для выполнения SQL-запроса без подготовки
    $db->exec($sql);
    echo "Таблица 'users' успешно создана или уже существовала";
} catch (PDOException $e) {
    die("Ошибка при создании таблицы: " . $e->getMessage());
}
