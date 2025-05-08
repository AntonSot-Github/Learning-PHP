<?php

/* 
ЗАДАНИЕ: «Инкубатор стартапов»
Представь, что у нас есть абстрактный класс Startup, описывающий стартапы, и интерфейс Investable, позволяющий им получать инвестиции.

Создай структуру, как описано ниже:

📦 Абстрактный класс Startup:
Свойства:
string $title
string $field (например, HealthTech, EdTech и т.п.)

Конструктор:
Принимает $title и $field

Абстрактный метод:
public function getPotential(): int — возвращает «потенциал» стартапа от 1 до 10

💸 Интерфейс Investable:
Метод public function requestFunding(Investor $investor): void

🧠 Класс Investor:
Свойство:
string $name
Метод:
public function investIn(Startup $startup): int
Который возвращает сумму инвестиций:
10000 * getPotential()

💼 Создай два класса-наследника от Startup, реализующих Investable:
HealthStartup
getPotential() возвращает rand(6, 10)

В requestFunding(...) инвестор вкладывает в этот стартап, и ты выводишь, сколько вложено

EducationStartup
getPotential() возвращает rand(3, 7)

Аналогично вызывает инвестора и выводит, сколько он вложил

🔁 Тест:
Создай массив с несколькими стартапами разных типов
Создай 2 инвесторов
Для каждого стартапа вызови requestFunding() с одним из инвесторов




*/


abstract class Startup 
{
    public string $title;
    public string $field;

    public function __construct($title, $field)
    {
        $this->title = $title;
        $this->field = $field;
    }

    public abstract function getPotential(): int;
}

interface Investable
{
    public function requestFunding(Investor $investor): void;
}

class Investor 
{
    public string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function investIn(Startup $startup): int
    {
        return 10000 * $startup->getPotential();
    }
}

class HealthStartup extends Startup implements Investable
{
    public function getPotential(): int
    {
        return rand(6, 10);
    }

    public function requestFunding(Investor $investor): void
    {
        echo "Investor {$investor->name} invests {$investor->investIn($this)} into {$this->title} {$this->field} \n";
    }
}

class EducationStartup extends Startup implements Investable
{
    public function getPotential(): int
    {
        return rand(3, 7);
    }

    public function requestFunding(Investor $investor): void
    {
        echo "Investor {$investor->name} invests {$investor->investIn($this)} into {$this->title} {$this->field} \n";
    }
}

$startups = [
    $healthStartup1 = new HealthStartup("Hospital", "Doc-profi"),
    $educationStartup1 = new EducationStartup("School-5", "Restruction"),
    $healthStartup2 = new HealthStartup("Hosp-restore", "NewLife"),
    $educationStartup2 = new EducationStartup("University", "StudyLife"),
];

$investor1 = new Investor("ReachBob");
$investor2 = new Investor("PoorRob");

foreach ($startups as $startup){
    $rand = rand(0,1);
    ($rand) ? $startup->requestFunding($investor1) : $startup->requestFunding($investor2);
}


