<?php

namespace App\Battle;

// Подключаем необходимые классы (фабрика героев и стратегии)
use App\Heroes\HeroFactory;
use App\Strategies\AggressiveStrategy;
use App\Strategies\DefensiveStrategy;
use App\Strategies\RandomStrategy;

class Battle
{
    // Свойство, хранящее количество раундов
    public int $roundsQuantity;

    // Конструктор принимает количество раундов и сохраняет
    public function __construct($roundsQuantity)
    {
        $this->roundsQuantity = $roundsQuantity;
    }

    public function fight()
    {
        // Список доступных классов героев
        $heroes = ["Archer", "Mage", "Warrior"];

        // Сюда попадут 2 случайных уникальных героя
        $randHeroes = [];

        // Пока не выбрано 2 разных героя — крутим рулетку
        while (count($randHeroes) < 2){
            $randNumber = rand(0, count($heroes) - 1); // случайный индекс
            if(!in_array($heroes[$randNumber], $randHeroes)){
                $randHeroes[] = $heroes[$randNumber];
            }
        }

        // Создаём объекты героев через фабрику
        $heroInBattle = [];

        foreach($randHeroes as $hero){
            $heroInBattle[] = HeroFactory::createHero($hero);
        }

        // Распаковываем массив в двух бойцов
        [$hero1, $hero2] = $heroInBattle;

        // Массив стратегий, ключ — имя, значение — анонимная стрелочная функция (функциональный подход)
        $strategies = [
            "Aggressive" => fn() => AggressiveStrategy::useAgrStrat(), 
            "Defensive"  => fn() => DefensiveStrategy::useDefStrat(), 
            "Random"     => fn() => RandomStrategy::useRandStrat(),
        ];

        // Массив названий стратегий
        $strategyKeys = array_keys($strategies);

        // Основной цикл боя
        for ($i = 1; $i <= $this->roundsQuantity; $i++) {
            // Случайный выбор стратегии для героя 1
            $stratKey1 = $strategyKeys[rand(0, 2)];
            $stratForHero1 = $strategies[$stratKey1](); // Вызов функции

            // Случайный выбор стратегии для героя 2
            $stratKey2 = $strategyKeys[rand(0, 2)];
            $stratForHero2 = $strategies[$stratKey2]();

            // Вывод урона первого героя
            echo "Round $i:" . PHP_EOL;
            echo "{$hero1->name} attacks {$hero2->name} for " . 
                ($hero1->attack() + $stratForHero1) . 
                " damage (Strategy: $stratKey1) \n";

            // Вывод урона второго героя
            echo "{$hero2->name} attacks {$hero1->name} for " . 
                ($hero2->attack() + $stratForHero2) . 
                " damage (Strategy: $stratKey2) \n";
        }
    }
}


