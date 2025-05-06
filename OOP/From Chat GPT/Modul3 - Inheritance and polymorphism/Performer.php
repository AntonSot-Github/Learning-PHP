<?php

/* 
Задание: "Цирк, да и только" 🎪

Создай базовый класс Performer с методом perform(), который пишет: "Перформанс начинается!".

Создай классы Clown, Juggler, Magician, которые наследуются от Performer и переопределяют perform(), добавляя:

Clown: "Клоун дразнит зрителей!"

Juggler: "Жонглёр кидает шары!"

Magician: "Фокусник достаёт кролика!"

В perform() каждого из них сначала вызывается parent::perform(), потом добавляется фраза.

Создай массив из всех артистов и вызови их perform().
*/

class Performer
{
    public function perform()
    {
        echo "Performance is starting! ";
    }
}

class Clown extends Performer
{
    public function perform()
    {
        parent::perform();
        echo "The clown teases the audience! \n";
    }
}

class Juggler extends Performer
{
    public function perform()
    {
        parent::perform();
        echo "The juggler throws balls! \n";
    }
}

class Magician extends Performer
{
    public function perform()
    {
        parent::perform();
        echo "The magician gets the rabbit! \n";
    }
}

$performers = [
    $clown = new Clown(),
    $juggler = new Juggler(),
    $magician = new Magician(),
];

foreach ($performers as $performer){
    $performer->perform();
}
