<?php

namespace App\Router;


/* Что делает этот класс?
Создает маршруты (Route), которые могут обрабатывать HTTP-запросы.
Позволяет удобно создавать маршруты через Route::get('/home', function() {...}) и Route::post('/login', function() {...}).
Хранит данные о маршруте: его URI, метод запроса и действие (контроллер/функцию).
Использует private свойства с автоматическим созданием, что упрощает код. */

class Route
{
    // Конструктор класса Route, который принимает три параметра:
    // $uri — строка, представляющая маршрут
    // $method — строка, представляющая HTTP-метод (GET, POST и т. д.)
    // $action — колбэк-функция или контроллер, который будет выполняться при запросе к маршруту
    public function __construct(private string $uri, private string $method, private $action)
    {
    }

    // Статический метод для создания маршрута с методом GET
    // Принимает два аргумента: $uri (адрес маршрута) и $action (что выполняется при запросе)
    // Возвращает новый экземпляр Route с фиксированным методом "GET"
    public static function get(string $uri, $action): static 
    {
        return new static($uri, 'GET', $action);
    }

    // Статический метод для создания маршрута с методом POST
    // Аналогично методу get(), но устанавливает метод "POST"
    public static function post(string $uri, $action): static 
    {
        return new static($uri, 'POST', $action);
    }

    // Геттер для получения URI маршрута
    public function getUri(): string
    {
        return $this->uri;
    }

    public function getAction(): callable 
    {
        return $this->action;
    }

    // Геттер для получения метода запроса (GET, POST и т. д.)
    public function getMethod(): string
    {
        return $this->method;
    }
}
