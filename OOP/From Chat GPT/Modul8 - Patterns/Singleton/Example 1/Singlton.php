<?php

class Logger
{
    //?Logger означает "либо объект класса Logger, либо null"
    //Говорит PHP: “Это свойство $instance может содержать или экземпляр Logger, или null (если ещё не инициализировано)”.
    private static ?Logger $instance = null; 

    private function __construct()
    {
        // Приватный конструктор, нельзя создать через new
    }

    public static function getInstance(): Logger 
    {
        if (self::$instance === null) {
            self::$instance = new Logger();
        }
        return self::$instance;
    }

    public function log(string $message) {
        echo "[LOG]: $message\n";
    }
}

// Использование:
$log1 = Logger::getInstance();
$log2 = Logger::getInstance();

$log1->log("Первое сообщение");
$log2->log("Второе сообщение");

// Это один и тот же объект:
var_dump($log1 === $log2); // true

