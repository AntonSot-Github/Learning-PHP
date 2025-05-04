<?php

/* 
Задание: Создай классы Message и EmailMessage, где EmailMessage наследует Message.
Оба класса должны иметь статический метод whoAmI(), который выводит название класса.
Создай метод announce() в родительском классе, который вызывает self::whoAmI() и static::whoAmI().

Вызови EmailMessage::announce() и посмотри, как отличается self:: от static::.
*/

class Message 
{
    public static function whoAmI()
    {
        echo "Message" . PHP_EOL;
    }

    public static function announce()
    {
        self::whoAmI();
        static::whoAmI();
    }
}

class EmailMessage extends Message
{
    public static function whoAmI()
    {
        echo "EmailMessage" . PHP_EOL;
    }
}

EmailMessage::announce();