<?php
/* 
Создай базовый класс Hero, у которого:

Свойства: $name, $powerLevel

Конструктор, который принимает name и powerLevel

Метод introduce(), который выводит:
"Я — $this->name, моя сила — $this->powerLevel!"

Создай классы-наследники Warrior, Mage, Rogue, каждый:

Переопределяет introduce(): сначала вызывает parent::introduce(), потом добавляет своё:

Warrior: "Я сражаюсь в ближнем бою!"

Mage: "Я владею магией стихий!"

Rogue: "Я действую скрытно!"

Добавь в Hero статический метод whoAmI(), который выводит: "Я герой!"
И добавь метод echoWho() в Hero, который вызывает и self::whoAmI(), и static::whoAmI().

➤ У каждого потомка переопредели whoAmI(), чтобы вывод был:

Warrior: "Я воин!"

Mage: "Я маг!"

Rogue: "Я разбойник!"

Создай массив из разных героев (микс из Warrior, Mage, Rogue)
➤ У каждого вызови introduce() и echoWho()

💡 Условия:
Используй parent::, self::, static::, где нужно.

Сделай код аккуратным и читаемым.

Имена героев придумай любые (можешь с юмором).

 */

class Hero
{
    public $name;
    public $powerLevel;

    public function __construct($name, $powerLevel)
    {
        $this->name = $name;
        $this->powerLevel = $powerLevel;
    }

    public function introduce()
    {
        echo "I am $this->name, my power is $this->powerLevel. \n";
    }

    public static function whoAmI()
    {
        echo "I am hero! \n";
    }

    public function echoWho()
    {
        self::whoAmI();
        static::whoAmI();
    }
}

class Warrior extends Hero
{
    public function introduce()
    {
        parent::introduce();
        echo "I fight in close combat! \n";
    }

    public static function whoAmI()
    {
        echo "I am warrior!";
    }
}

class Mage extends Hero
{
    public function introduce()
    {
        parent::introduce();
        echo "I have elemental magic! \n";
    }

    public static function whoAmI()
    {
        echo "I am Mage!";
    }
}

class Rogue extends Hero
{
    public function introduce()
    {
        parent::introduce();
        echo "I act stealthily!";
    }

    public static function whoAmI()
    {
        echo "I am Rogue!";
    }
}

$heroes = [
    $warrior = new Warrior("Dwarf", 90),
    $mage = new Mage("Hotabych", 70),
    $rouge = new Rogue("Shadow", 50),
];

foreach ($heroes as $hero){
    $hero->introduce();
    $hero->echoWho();
    echo "\n ... \n";
}
