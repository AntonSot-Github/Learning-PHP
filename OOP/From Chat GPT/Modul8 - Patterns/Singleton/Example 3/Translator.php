<?php
/* 
🧩 Задание: Singleton-хранилище переводов
Ты создаёшь мультиязычную систему, где все переводы фраз для сайта хранятся в одном месте. В этом тебе поможет паттерн Singleton.

🎯 Твоя задача:
Создай класс Translator, реализующий паттерн Singleton.

🔧 Структура класса Translator:
Свойства:
private array $translations = []; — массив переводов, где ключ — язык ('en', 'ru' и т. д.), а значение — массив с переводами:

php
Копировать
Редактировать
[
  'en' => ['greet' => 'Hello', 'bye' => 'Goodbye'],
  'ru' => ['greet' => 'Привет', 'bye' => 'Пока']
]
private string $currentLang = 'en'; — текущий язык.

Методы:
public static function getInstance(): Translator

реализация паттерна Singleton

public function setLanguage(string $lang): void

задаёт текущий язык (например: ru, en)

public function addTranslation(string $lang, string $key, string $value): void

добавляет новый перевод для языка

public function translate(string $key): string

возвращает перевод по ключу для текущего языка

если перевода нет — возвращает "[Translation missing for $key]"
*/
class Translator
{
    private static ?Translator $instance = null;
    private array $translations = [
        'en' => ['greet' => 'Hello', 'bye' => 'Goodbye'],
        'ru' => ['greet' => 'Привет', 'bye' => 'Пока']
    ];
    private string $currentLanguage = 'en';

    public function __construct()
    {}

    public static function getInstance(): Translator
    {
        if(self::$instance === null){
            self::$instance = new Translator();
        }
        return self::$instance;
    }

    public function setLang(string $lang): void
    {
        $this->currentLanguage = $lang;
    }

    public function addTranslation(string $lang, string $key, string $value): void
    {
        if($lang === 'en'){
            $this->translations['en'] += [$key => $value];
        } else {
            $this->translations['ru'] += [$key => $value];
        }
    }

    public function translate(string $key): string
    {
        $lang = $this->currentLanguage;
        if (array_key_exists($key, $this->translations)){
            return $this->translations[$lang][$key];
        } else {
            return "[Translation missing for $key]";
        }
    }
}

$translator = Translator::getInstance();
$translator->addTranslation('en', 'hard', 'not easy');
$translator->addTranslation('ru', 'hard', 'тяжело');

$translator->setLang('ru');

echo $translator->translate('hard');


