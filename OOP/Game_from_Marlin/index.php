<?php

class Player {
    public $name;
    public $coins;


    public function __construct($name, $coins)
    {
        $this->name = $name;
        $this->coins = $coins;
    }

    public function point(Player $player)
    {
        $this->coins++;
        $player->coins--;
    }

    public function bank()
    {
        return $this->coins;
    }

    public function bankrupt()
    {
        return $this->coins == 0;
    }


}

class Game {
    protected $player1;
    protected $player2;
    protected $flips = 1;

    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function flip()
    {
        //Подбросить монету
        return rand(0, 1) ? "орел" : "решка";
    }

    // n1 / (n1 + n2)

    public function start()
    {
        while(true){


            //Если орёл, игрок 1 получает монету, игрок 2 теряет
            if($this->flip() == "орел") {
                $this->player1->point($this->player2);
            } else {
                $this->player2->point($this->player1);
            }
        
        
            //Если кол-во монет у одного из игроков станет 0, игра окончена
            if($this->player1->bankrupt() || $this->player2->bankrupt()) {
                return $this->end();
            }
            $this->flips++;
        }
    }

    public function winner(): Player
    {
        return $this->player1->bank() > $this->player2->bank() ? $this->player1 : $this->player2;
    }

    public function end()
    {
        echo "Game over" . "\n" . "Winner is " . $this->winner()->name. "\n" . "Quentety of flips are: " . $this->flips, "\n";
        echo $this->player1->name . ":" . $this->player1->bank(), "\n";
        echo $this->player2->name . ":" . $this->player2->bank(), "\n";
    }
}

$game = new Game (
    new Player("Joe", 10000),
    new Player ("Jane", 100)
);

$game->start();