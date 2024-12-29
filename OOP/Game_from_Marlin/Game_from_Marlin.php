<?php

// Класс Player представляет игрока в игре
class Player {
    public $name; // Имя игрока
    public $coins; // Количество монет у игрока

    // Конструктор, инициализирует имя и количество монет игрока
    public function __construct($name, $coins)
    {
        $this->name = $name;
        $this->coins = $coins;
    }

    // Метод для перевода одной монеты от другого игрока к текущему игроку
    public function point(Player $player)
    {
        $this->coins++; // Увеличиваем монеты текущего игрока
        $player->coins--; // Уменьшаем монеты у другого игрока
    }

    // Метод возвращает текущее количество монет у игрока
    public function bank()
    {
        return $this->coins;
    }

    // Метод рассчитывает шансы текущего игрока на победу в процентах
    public function chanses(Player $player)
    {
        return round($this->bank() / ($this->bank() + $player->bank()), 2) * 100 . "%";
    }

    // Метод проверяет, обанкротился ли игрок (монеты равны 0)
    public function bankrupt()
    {
        return $this->coins == 0;
    }
}

// Класс Game представляет игру
class Game {
    protected $player1; // Первый игрок
    protected $player2; // Второй игрок
    protected $flips = 1; // Счетчик количества бросков монеты

    // Конструктор, инициализирует двух игроков
    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    // Метод для подбрасывания монеты (возвращает "орел" или "решка")
    public function flip()
    {
        return rand(0, 1) ? "орел" : "решка";
    }

    // Метод начинает игру
    public function start()
    {
        echo "Game is started", "\n"; // Сообщение о начале игры
        // Вывод шансов на победу для обоих игроков
        echo "Chanses for win of " . $this->player1->name . " are " . $this->player1->chanses($this->player2) . "\n";
        echo "Chanses for win of " . $this->player2->name . " are " . $this->player2->chanses($this->player1) . "\n";
        $this->play(); // Переход к процессу игры
    }

    // Основной игровой процесс
    public function play()
    {
        while (true) { // Бесконечный цикл, пока не будет определен победитель
            // Если выпадает "орел", первый игрок получает монету, второй теряет
            if ($this->flip() == "орел") {
                $this->player1->point($this->player2);
            } else { // Если выпадает "решка", второй игрок получает монету, первый теряет
                $this->player2->point($this->player1);
            }

            // Проверка на банкротство одного из игроков
            if ($this->player1->bankrupt() || $this->player2->bankrupt()) {
                return $this->end(); // Завершаем игру
            }
            $this->flips++; // Увеличиваем счетчик количества бросков монеты
        }
    }

    // Метод определяет победителя (игрок с большим количеством монет)
    public function winner(): Player
    {
        return $this->player1->bank() > $this->player2->bank() ? $this->player1 : $this->player2;
    }

    // Метод завершает игру и выводит результаты
    public function end()
    {
        // Вывод имени победителя, количества бросков монеты и остатка монет у каждого игрока
        echo "Winner is " . $this->winner()->name . "\n" . "Quentety of flips are: " . $this->flips, "\n";
        echo $this->player1->name . ":" . $this->player1->bank(), "\n";
        echo $this->player2->name . ":" . $this->player2->bank(), "\n";
        echo "Game over" . "\n"; // Сообщение о завершении игры
    }
}

// Создаем игру с двумя игроками
$game = new Game (
    new Player("Joe", 10000), // Первый игрок с 10000 монетами
    new Player("Jane", 100) // Второй игрок с 100 монетами
);

// Запускаем игру
$game->start();
