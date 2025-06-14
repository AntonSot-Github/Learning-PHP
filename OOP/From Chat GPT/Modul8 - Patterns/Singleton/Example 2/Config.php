<?php
/* 
Задание:

Создай класс Config, реализующий паттерн Singleton.
У класса должно быть приватное свойство $settings (массив).

Добавь методы:
set(string $key, mixed $value)
get(string $key)

Проверь, что можно установить и получить настройки через объект Config::getInstance().

🎁 Бонус: Попробуй получить объект дважды и убедиться, что это один и тот же экземпляр.
*/

class Config
{
    private array $setting = [];
    private static ?Config $instance = null;
    
    public function __construct()
    {
    }

    public static function getInstance(): Config
    {
        if(self::$instance === null){
            self::$instance = new Config();
        }
        return self::$instance;
    }

    public function set(string $key, mixed $value)
    {
        $this->setting[$key] = $value;
    }

    public function get(string $key)
    {
        return $this->setting[$key] . PHP_EOL;
    }
}

$config = Config::getInstance();
$config1 = Config::getInstance();

Config::getInstance()->set('key', 'value');
echo Config::getInstance()->get('key');

Config::getInstance()->set('key2', 'value2');
echo $config->get('key2');

echo $config1->get('key');
