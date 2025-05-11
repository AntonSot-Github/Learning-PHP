<?php

/* 
Финальное задание: “Служба оповещений и логирования”
Создай систему оповещений и логирования для пользователей и администраторов.

Требования:
Трейт LoggerTrait

Метод log($message) — выводит [LOG]: сообщение.

Трейт EmailNotifier

Метод notify($email) — выводит Email sent to $email.

Трейт SmsNotifier

Метод notify($phone) — выводит SMS sent to $phone.

Класс User

Использует EmailNotifier и LoggerTrait.

Метод sendNotification():

вызывает notify() (email) и логирует результат через log(), передав, например, "User was notified via email".

Класс Admin

Использует EmailNotifier, SmsNotifier, и LoggerTrait.

Внимание: оба трейта EmailNotifier и SmsNotifier содержат метод notify(). Разреши конфликт:

Метод notify() должен быть из SmsNotifier.

Метод notifyEmail() — псевдоним на EmailNotifier::notify.

Метод sendNotification():

вызывает notify() (SMS) и notifyEmail() (Email),

логирует оба события (через log()).

Тест:

Создай экземпляры User и Admin, вызови sendNotification() для каждого.

💡 Пример вывода:
Email sent to user@mail.com 
[LOG]: User was notified via email 
SMS sent to 55-55-55 
Email sent to admin@mail.com 
[LOG]: Admin was notified via SMS and Email
*/

trait LoggerTrait
{
    public string $message;

    public function log($message)
    {
        echo "[LOG]: $message \n";
    }
}

trait EmailNotifier
{   
    public string $email;

    public function notify($email):bool
    {
        echo "Email send to $email \n";
        return true;
    }
}

trait SmsNotifier
{
    public string $phone;

    public function notify($phone):bool
    {
        echo "Sms sent to $phone \n";
        return true;
    }
}

class User 
{
    use EmailNotifier, LoggerTrait;

    public string $name;



    public function __construct($name = "User", $email = "user@mail.com", $message = "User was notified via email")
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    public function sendNotification()
    {
        if ($this->notify($this->email)){
            $this->log($this->message);
        }

    }
}

class Admin extends User
{
    use EmailNotifier, SmsNotifier{
        SmsNotifier::notify insteadOf EmailNotifier;
        Emailnotifier::notify as notifyEmail;
    }

    public string $name;


    public function __construct($name = "Admin", $email = "admin@mail.com", $phone = "55-55-55", $message = "Admin was notified via SMS")
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->message = $message;
    }

    public function sendNotification()
    {
        if ($this->notify($this->phone) && $this->notifyEmail($this->email)){
            $this->log($this->message);
        }
    }
}

$user1 = new User();
$admin1 = new Admin();

$user1->sendNotification();
$admin1->sendNotification();

