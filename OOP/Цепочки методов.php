<?php

/* 
Цепочка методов (Method Chaining) в PHP
Цепочка методов — это способ вызывать несколько методов объекта последовательно в одной строке. 
Это возможно, если каждый метод возвращает $this (текущий объект) вместо void или других значений.

Зачем это нужно? 
✅ Делает код более читаемым
✅ Упрощает работу с объектами
✅ Уменьшает количество переменных
 */

// Пример 1: Работа с сеттерами
// Допустим, у нас есть класс User, в котором методы возвращают $this, позволяя вызывать их в цепочке.

class User 
{
    private string $name;
    private int $age;

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this; // Возвращаем текущий объект
    }

    public function setAge(int $age): self
    {
        $this->age = $age;
        return $this; // Возвращаем текущий объект
    }

    public function getInfo(): string
    {
        return "Имя: {$this->name}, Возраст: {$this->age}";
    }
}

$user = (new User())->setName('Алексей')->setAge(30);
echo $user->getInfo() . PHP_EOL; // Выведет: "Имя: Алексей, Возраст: 30"

// Пример 2: Формирование SQL-запросов
// Допустим, у нас есть класс QueryBuilder, который позволяет строить SQL-запросы методом цепочки.

class QueryBuilder 
{
    private string $query = '';

    public function select(string $fields): self
    {
        $this->query .= "SELECT $fields ";
        return $this;
    }

    public function from(string $table): self
    {
        $this->query .= "FROM $table ";
        return $this;
    }

    public function where(string $condition): self
    {
        $this->query .= "WHERE $condition ";
        return $this;
    }

    public function getQuery(): string
    {
        return trim($this->query) . ';';
    }
}

$query = (new QueryBuilder())
    ->select('*')
    ->from('users')
    ->where('age > 18');

echo $query->getQuery() . PHP_EOL; 
// Выведет: "SELECT * FROM users WHERE age > 18;"

/* 
Вывод
📌 Цепочка методов позволяет вызывать несколько методов в одной строке.
📌 Обязательное условие — каждый метод (кроме последнего) должен возвращать $this.
📌 Часто используется в сеттерах, ORM (Eloquent, Doctrine), QueryBuilder и других фреймворках. 
*/
