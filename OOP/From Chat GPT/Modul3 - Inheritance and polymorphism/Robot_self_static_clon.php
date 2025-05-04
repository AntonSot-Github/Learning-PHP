<?php

/* 
 Задание: “Кто я, если я клонирую себя?”

Создай:
Класс Robot с:
статическим методом whoAmI(), который выводит "I am a Robot"
статическим методом introduce(), который вызывает self::whoAmI() и static::whoAmI()

Класс Android, который наследует Robot и переопределяет whoAmI() с выводом "I am an Android"

Вызови: Android::introduce();

Затем создай экземпляр Android, клонируй его ($clone = clone $android;) и вызови: $clone::introduce();

Вопросы к заданию:
Будет ли отличаться поведение при вызове introduce() у класса и у клона объекта?
Почему self:: и static:: ведут себя именно так?
*/


class Robot
{

    public static function whoAmI()
    {
        echo "I am a robot \n";
    }

    public static function introduce()
    {
        self::whoAmI();
        static::whoAmI();
    }
}

class Android extends Robot
{
    public static function whoAmI()
    {
        echo "I am an Android \n";
    }
}

Android::introduce();

$android = new Android();
$clone = clone $android;
$clone::introduce();

/* 
Вывод:
✅ Ты правильно понял, что поведение статических методов не зависит от конкретного объекта, даже клонированного.

✅ Отлично описал, что различия могли бы быть только если бы поведение метода зависело от объекта.
 */