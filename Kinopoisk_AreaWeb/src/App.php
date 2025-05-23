<?php

namespace App;

use App\Router\Router;

class App
{
    public function run(): void
    {
        $router = new Router();
        $uri = $_SERVER['REQUEST_URI'];//GET-запрос для передачи на маршрутизатор 
        $method = $_SERVER['REQUEST_METHOD'];
        $router->dispatch($uri, $method);
    }
}