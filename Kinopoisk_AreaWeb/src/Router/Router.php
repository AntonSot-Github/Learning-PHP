<?php

namespace App\Router;

/* 
Разбор работы класса Router

Свойство $routes
Хранит маршруты в виде массива, сгруппированные по HTTP-методам (GET, POST).

Метод __construct()
Автоматически вызывается при создании объекта Router.
Загружает маршруты с помощью initRoutes().

Метод dispatch($uri)
Определяет, существует ли маршрут с переданным URI.
Если маршрут есть, вызывается его обработчик.
Если нет, выводится сообщение 404: Страница не найдена.

Метод initRoutes()
Загружает маршруты из routes.php.
Добавляет их в $routes в зависимости от метода запроса.

Метод getRoutes()
Загружает маршруты из файла routes.php.
Этот файл должен возвращать массив маршрутов. 
*/

class Router 
{
    // Приватное свойство для хранения маршрутов.
    // Это многомерный массив, где ключи — это HTTP-методы (GET, POST),
    // а значения — массивы маршрутов, привязанных к каждому методу.
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    // Конструктор вызывается при создании объекта Router.
    // Он сразу вызывает метод initRoutes(), который загружает маршруты.
    public function __construct()
    {
        $this->initRoutes();
    }

    // Метод для обработки входящего запроса.
    // Принимает строку $uri (адрес запроса, например, "/home").
    public function dispatch(string $uri, string $method): void 
    {
        $route = $this->findRoute($uri, $method);
        if (! $route) {
            $this->notFound();
        }

        $route->getAction()();
    }

    private function notFound(): void
    {
        echo '404 | Not found';
        exit;
    }

    private function findRoute(string $uri, string $method): Route|false
    {
        if (!isset($this->routes[$method][$uri])){
            return false;
        }
        return $this->routes[$method][$uri];
    }



    // Метод для инициализации маршрутов.
    // Загружает маршруты и добавляет их в массив $routes.
    private function initRoutes()
    {
        $routes = $this->getRoutes(); // Получаем маршруты из конфигурации.

        // Перебираем каждый маршрут и добавляем его в соответствующий метод (GET, POST).
        foreach ($routes as $route) {
            $this->routes[$route->getMethod()][$route->getUri()] = $route;
        }
    }
    /**
     * @return Route[]
     */

    // Метод для получения маршрутов из конфигурационного файла.
    // Файл routes.php должен возвращать массив маршрутов.
    private function getRoutes(): array
    {
        return require_once APP_PATH . '/config/routes.php';
    }
}
