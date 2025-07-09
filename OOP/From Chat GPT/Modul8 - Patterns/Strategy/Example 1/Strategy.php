<?php

//Strategy — это шаблон, позволяющий изменять поведение объекта на лету, передавая ему разные алгоритмы (стратегии) как отдельные классы.

//  Простой пример из жизни:
// Допустим, у нас есть воин. Он может атаковать по-разному:

// Иногда — мечом ⚔️

// Иногда — луком 🏹

// Иногда — магией 🔥

// Мы создаём отдельные классы-стратегии, каждый со своей реализацией метода attack()
// А объект Воина получает стратегию через конструктор или метод, и применяет её, не заботясь о внутренней логике.


interface AttackStrategy {
    public function attack(): void;
}

class SwordAttack implements AttackStrategy {
    public function attack(): void {
        echo "Атакует мечом!";
    }
}

class BowAttack implements AttackStrategy {
    public function attack(): void {
        echo "Стреляет из лука!";
    }
}

class Warrior {
    private AttackStrategy $strategy;

    public function __construct(AttackStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(AttackStrategy $strategy): void {
        $this->strategy = $strategy;
    }

    public function attack(): void {
        $this->strategy->attack();
    }
}

$warrior = new Warrior(new SwordAttack());
$warrior->attack(); // Атакует мечом!

$warrior->setStrategy(new BowAttack());
$warrior->attack(); // Стреляет из лука!
