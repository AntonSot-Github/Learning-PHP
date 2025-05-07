<?php

/* 
Задание: Система оценивания проектов
Создай систему, где эксперты оценивают проекты.

🧱 Абстрактный класс Project
Свойства:
string $title
string $category
Метод __construct($title, $category)
Абстрактный метод getComplexity(): int — возвращает сложность проекта (число от 1 до 10)

👥 Интерфейс Evaluatable
Метод evaluate(Expert $expert): void

🧑‍💼 Класс WebsiteProject и AIProject наследуют Project и реализуют Evaluatable
WebsiteProject::getComplexity() возвращает случайное число от 3 до 6
AIProject::getComplexity() — от 7 до 10
Метод evaluate(Expert $expert):
вызывает у переданного объекта $expert метод giveScore(Project $project)
выводит результат (например: "Эксперт John оценивает проект AI Assistant на 9/10")

🧠 Класс Expert
Свойства: string $name
Метод giveScore(Project $project): int:
получает сложность проекта через $project->getComplexity()
возвращает оценку = 10 - abs(5 - $complexity) (чем ближе к 5 — тем выше оценка)

🧪 Что сделать:
Создай 2 экспертов и 3 проекта (смешай типы).
У каждого проекта вызови evaluate() с одним из экспертов.

📌 Условия:
Используй типизацию в аргументах (Expert $expert, Project $project)
Метод giveScore() вызывается внутри evaluate()
Минимум 3 вызова evaluate()
*/

interface Evaluatable
{
    public function evaluate(Expert $expert):void;
}

abstract class Project 
{
    public string $title;
    public string $category;

    public function __construct($title, $category)
    {
        $this->title = $title;
        $this->category = $category;
    }

    abstract public function getComplexity():int;
}

class Expert
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function giveScore(Project $project)
    {
        $complexity = $project->getComplexity();
        return 10 - abs(5 - $complexity);
    }
}

class WebSiteProject extends Project implements Evaluatable
{
    public function getComplexity():int
    {
        return rand(3, 6);
    }

    public function evaluate(Expert $expert):void
    {
        $expert->giveScore($this);
        echo "Expert $expert->name evaluates project AI Assistant on {$project->getComplexity()}" . PHP_EOL;
    }
}

class AIProject extends Project implements Evaluatable
{
    public function __construct($title, $category)
    {
        parent::__construct($title, $category);
    }

    public function getComplexity():int
    {
        return rand(7, 10);
    }

    public function evaluate(Expert $expert):void
    {
        $expert->giveScore($this);
        echo "Expert {$expert->name} evaluates AI Assistant project on {$this->getComplexity()}/10 " . PHP_EOL;
    }
}

$project1 = new AIProject("Run-program", "Sport");
$project2 = new WebSiteProject("English-learning", "Education");
$project3 = new WebSiteProject("Car-repaire", "Mechanics");

$expert1 = new Expert("Tima");
$expert2 = new Expert("Filimonius");

$project1->evaluate($expert1);

//Были ошибки:

//❌ В evaluate() ты используешь несуществующую переменную $project
//$expert->giveScore($project); // ← переменная $project не существует в этом методе
//👉 А надо передать текущий объект, то есть $this:
//$expert->giveScore($this);

//❌ У тебя создаются объекты от abstract class Project, что нельзя
//$project2 = new Project(...); // ← нельзя создавать экземпляр абстрактного класса
//👉 Надо использовать WebsiteProject или AIProject, потому что только они реализуют getCompexity().

//❌ В evaluate() ты выводишь имя эксперта как $expert->name, но это не работает без фигурных скобок в строке
//echo "Expert $expert->name evaluates..." // ← неправильно
//👉 Надо писать:
//echo "Expert {$expert->name} evaluates...";

