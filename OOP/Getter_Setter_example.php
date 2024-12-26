<?php 
class Person {
    private string $name; // Приватное свойство
    private int $age;     // Приватное свойство

    // Геттер для имени
    public function getName(): string {
        return $this->name;
    }

    // Сеттер для имени
    public function setName(string $name): void {
        // Проверка данных
        if (strlen($name) < 2) {
            throw new InvalidArgumentException("Name must be at least 2 characters long.");
        }
        $this->name = $name;
    }

    // Геттер для возраста
    public function getAge(): int {
        return $this->age;
    }

    // Сеттер для возраста
    public function setAge(int $age): void {
        // Проверка данных
        if ($age < 0) {
            throw new InvalidArgumentException("Age cannot be negative.");
        }
        $this->age = $age;
    }
}

// Пример использования
$person = new Person();
$person->setName("John");
$person->setAge(25);

echo "Name: " . $person->getName(); // Name: John
echo "Age: " . $person->getAge();   // Age: 25


//Пример с автогенерацией сеттеров и геттеров
class DynamicPerson {
    private array $data = [];

    public function __get(string $property) {
        return $this->data[$property] ?? null;
    }

    public function __set(string $property, $value) {
        $this->data[$property] = $value;
    }
}

$person = new DynamicPerson();
$person->name = "Alice"; // Устанавливается через __set
$person->age = 30;       // Устанавливается через __set

echo $person->name;      // Получается через __get
echo $person->age;       // Получается через __get
