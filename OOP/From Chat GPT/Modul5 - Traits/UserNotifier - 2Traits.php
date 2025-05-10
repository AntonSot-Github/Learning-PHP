<?php
/* 
Задание 2
Создай два трейта:

EmailNotifier с методом notifyEmail($email)

SmsNotifier с методом notifySms($phone)

Создай класс UserNotifier, подключи оба трейта. Добавь метод notifyAll().
*/

trait EmailNotifier
{
    public function notifyEmail($email)
    {
        echo "Email is correct \n";
    }
}

trait SmsNotifier 
{
    public function notifySms($phone)
    {
        echo "Your sms is really funny :) \n";
    }
}

class UserNotifier
{
    use EmailNotifier, SmsNotifier;

    public function __construct(
        public string $email,
        public string $phone
    ) {}

    public function notifyAll()
    {
        $this->notifySms($this->phone);
        $this->notifyEmail($this->email);
    }
}

$user1 = new UserNotifier("user1@mail.com", "4-33-33");

$user1->notifyAll();