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
            //throw new InvalidArgumentException(...) — это способ выбросить исключение, если аргумент некорректен.
            //throw — ключевое слово для выброса исключения (ошибки на уровне программы).
            //new InvalidArgumentException(...) — создаёт объект встроенного класса исключения PHP.
            //Если передать имя короче 2 символов, то выполнение прервётся 
            // и будет выдана ошибка, которую можно будет "поймать" через try/catch (если нужно).
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

//__get() и __set() — магические методы PHP.
//Они позволяют обращаться к несуществующим свойствам объекта как будто они есть.

$person = new DynamicPerson();
$person->name = "Alice"; // Устанавливается через __set
$person->age = 30;       // Устанавливается через __set

echo $person->name;      // Получается через __get
echo $person->age;       // Получается через __get
