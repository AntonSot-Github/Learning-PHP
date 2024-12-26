<?php

//-------------пример использования------------
class Example {
    public static string $staticProperty = "Static Value";

    public static function staticMethod(): void {
        echo "This is a static method.\n";
    }
}

//-------------пример использования------------
class Counter {
    public static int $count = 0;

    public static function increment(): void {
        self::$count++;
    }
}

Counter::increment();
Counter::increment();
echo Counter::$count; // 2



/*  Учет пользователей  */
class User {
    public static int $userCount = 0;

    public function __construct() {
        self::$userCount++;
    }

    public static function getUserCount(): int {
        return self::$userCount;
    }
}

$user1 = new User();
$user2 = new User();

echo User::getUserCount(); // 2


/* Конфигурация приложения */
class Config {
    private static array $settings = [];

    public static function set(string $key, $value): void {
        self::$settings[$key] = $value;
    }

    public static function get(string $key) {
        return self::$settings[$key] ?? null;
    }
}

Config::set('database', 'mysql');
Config::set('host', 'localhost');

echo Config::get('database'); // mysql
echo Config::get('host');     // localhost



/* Пример: Конфигурация приложения */
class Config {
    private static array $settings = [];

    public static function set(string $key, $value): void {
        self::$settings[$key] = $value;
    }

    public static function get(string $key) {
        return self::$settings[$key] ?? null;
    }
}

Config::set('database', 'mysql');
Config::set('host', 'localhost');

echo Config::get('database'); // mysql
echo Config::get('host');     // localhost
