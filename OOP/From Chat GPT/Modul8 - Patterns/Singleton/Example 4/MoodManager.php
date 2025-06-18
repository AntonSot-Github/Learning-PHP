<?php
/*
🧩 Задание: «Фабрика Эмоций»
Ты создаёшь систему управления эмоциями.
Каждое настроение должно иметь описание и цвет — и ты должен уметь:
добавлять эмоции,
получать описание по названию эмоции,
менять язык описаний.

Используй Singleton и работу с массивами + строками.

📦 Класс: MoodManager
Реализуй его по паттерну Singleton.

🧠 Свойства:
private array $moods — ассоциативный массив эмоций.
Пример структуры:

php

[
    'en' => [
        'happy' => ['description' => 'Feeling great!', 'color' => 'yellow'],
        'sad' => ['description' => 'Feeling down...', 'color' => 'blue']
    ],
    'ru' => [
        'happy' => ['description' => 'Чувствую себя отлично!', 'color' => 'жёлтый'],
        'sad' => ['description' => 'Грусть-печаль...', 'color' => 'синий']
    ]
]
private string $lang — текущий язык (по умолчанию 'en').

🧰 Методы:
public static function getInstance(): MoodManager
→ реализует Singleton.

public function setLang(string $lang): void
→ устанавливает язык описания.

public function addMood(string $lang, string $name, string $description, string $color): void
→ добавляет эмоцию в нужный язык.

public function getMoodInfo(string $name): string
→ возвращает строку вида:
"Mood: happy — Feeling great! (yellow)"

Если эмоция не найдена — вернуть:
"[Mood 'angry' not defined in en]"

🧪 index.php:

Получи экземпляр MoodManager.
Добавь эмоции на двух языках.
Установи язык.
Получи информацию о настроении.
Попробуй запросить несуществующее настроение (например, 'confused').
*/

class MoodManager
{
    private static ?MoodManager $instance = null;
    private array $moods = [
    'en' => [
        'happy' => ['description' => 'Feeling great!', 'color' => 'yellow'],
        'sad' => ['description' => 'Feeling down...', 'color' => 'blue']
        ],
    'ru' => [
        'happy' => ['description' => 'Чувствую себя отлично!', 'color' => 'жёлтый'],
        'sad' => ['description' => 'Грусть-печаль...', 'color' => 'синий']
        ]
    ];
    private string $lang = 'en';

    public function __construct()
    {}

    public static function getInstance(): MoodManager
    {
        if(self::$instance === null){
            self::$instance = new MoodManager();
        }
        return self::$instance;
    }

    public function setLang($lang): void
    {
        $this->lang = $lang;
    }

    public function addMood(string $lang, string $name, string $description, string $color): void
    {
        if($lang === 'en'){
            $this->moods['en'] += [$name => ['description' => $description, 'color' => $color]];
        } elseif ($lang === 'ru'){
            $this->moods['ru'] += [$name => ['description' => $description, 'color' => $color]];
        } else {
            $this->moods += [$lang => [$name => ['description' => $description, 'color' => $color]]];
        }
    }

    public function getMoodInfo(string $name): string
    {
        $lang = $this->lang;
        if(in_array($this->moods[$lang][$name], $this->moods[$lang])){
            return "Mood: $name - {$this->moods[$lang][$name]['description']}({$this->moods[$lang][$name]['color']})";
        } else {
            return "[Mood $name not defined in $lang]";
        }
    }
}


$moodManager1 = MoodManager::getInstance();

$moodManager1->addMood('en', 'surprise', 'How can this be!?', 'purple');

$moodManager1->setLang('en');
print_r($moodManager1->getMoodInfo('happy') . PHP_EOL);
print_r($moodManager1->getMoodInfo('surprise') . PHP_EOL);

$moodManager1->addMood('pl', 'radosc', 'Bardzo dobre poczucie mam', 'bialy');
$moodManager1->setLang('pl');
print_r($moodManager1->getMoodInfo('radosc') . PHP_EOL);


