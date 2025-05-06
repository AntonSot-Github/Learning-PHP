<?php
/* 
Задача:
Абстрактный класс Musician:

Свойства: $name, $instrument

Конструктор, принимающий name и instrument

Абстрактный метод playSolo()

Метод introduce(), который выводит:
"Меня зовут {$this->name}, я играю на {$this->instrument}."

Создай 3 класса-наследника:

Violinist, Drummer, Trumpeter
Каждый реализует playSolo() по-своему, например:

Violinist: "🎻 {$this->name} извлекает душевную мелодию!"

Drummer: "🥁 {$this->name} задаёт ритм!"

Trumpeter: "🎺 {$this->name} трубит фанфары!"

Создай массив из разных музыкантов.
➤ Для каждого вызови introduce() и playSolo().

📌 Условия:
Всё должно использоваться по ООП: абстракция, переопределение, parent::, где уместно.

Код читаемый и без лишнего.

Минимум 3 музыканта, имена — любые, можно весёлые.
 */

abstract class Musician
{
    public $name;
    public $instrument;

    public function __construct($name, $instrument)
    {
        $this->name = $name;
        $this->instrument = $instrument;
    }

    abstract public function playSolo();

    public function introduce()
    {
        echo "My name is {$this->name}, I play with {$this->instrument}. \n";
    }
}

class Violinist extends Musician
{
    public function playSolo()
    {
        echo "🎻 {$this->name} produces a soulful melody! \n ... \n";
    }
}

class Drummer extends Musician 
{
    public function playSolo()
    {
        echo "🥁 {$this->name} sets the rhythm! \n ... \n";
    }
}

class Trumpeter extends Musician
{
    public function playSolo()
    {
        echo "🎺 {$this->name} blows the fanfare! \n ... \n";
    }
}

$musicians = [
    $violinist = new Violinist("Fiiituuu", "violin"),
    $drummer = new Drummer("Boomboom", "drum"),
    $trumpeter = new Trumpeter("Poopoo", "trumpet"),
];

foreach ($musicians as $musician){
    $musician->introduce();
    $musician->playSolo();
}

/* 
Почему parent:: не пригодился?
parent:: нужен, когда ты:

переопределяешь метод родителя, но хочешь сначала вызвать его, а потом что-то добавить;

например, как ты делал в прошлых заданиях с introduce() и perform().

Здесь метод introduce() не переопределяется — ты используешь его как есть, а playSolo() в родителе абстрактный, так что вызывать там нечего.
 */
