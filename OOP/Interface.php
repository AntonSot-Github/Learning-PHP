<?php

//-----------Простой пример интерфейса--------------------
interface Animal {
    public function makeSound(): string;
}

class Dog implements Animal {
    public function makeSound(): string {
        return "Woof!";
    }
}

class Cat implements Animal {
    public function makeSound(): string {
        return "Meow!";
    }
}



// ---------------Использование------------------------
function animalSound(Animal $animal) {
    echo $animal->makeSound();
}

$dog = new Dog();
$cat = new Cat();

animalSound($dog); // Вывод: Woof!
animalSound($cat); // Вывод: Meow!



//--------Интерфейсы с несколькими методами--------------
interface Vehicle {
    public function startEngine(): void;
    public function stopEngine(): void;
    public function getFuelLevel(): float;
}

class Car implements Vehicle {
    private float $fuelLevel;

    public function __construct(float $fuelLevel) {
        $this->fuelLevel = $fuelLevel;
    }

    public function startEngine(): void {
        echo "Engine started!";
    }

    public function stopEngine(): void {
        echo "Engine stopped!";
    }

    public function getFuelLevel(): float {
        return $this->fuelLevel;
    }
}

$car = new Car(50.5);
$car->startEngine(); // Engine started!
echo $car->getFuelLevel(); // 50.5


//------------Класс может реализовывать сразу несколько интерфейсов----------------
interface Flyable {
    public function fly(): void;
}

interface Swimmable {
    public function swim(): void;
}

class Duck implements Flyable, Swimmable {
    public function fly(): void {
        echo "The duck is flying!";
    }

    public function swim(): void {
        echo "The duck is swimming!";
    }
}

$duck = new Duck();
$duck->fly();  // The duck is flying!
$duck->swim(); // The duck is swimming!


//-----------------Пример использования в Laravel------------------
interface Logger {
    public function log(string $message): void;
}

class FileLogger implements Logger {
    public function log(string $message): void {
        // Логирование в файл
        echo "Logging to file: $message";
    }
}

class App {
    private Logger $logger;

    public function __construct(Logger $logger) {
        $this->logger = $logger;
    }

    public function run(): void {
        $this->logger->log("Application started.");
    }
}

$app = new App(new FileLogger());
$app->run(); // Logging to file: Application started.
