<?php

//🔌 Dependency Injection (DI)

//Dependency Injection — это передача зависимостей извне. Вместо того чтобы класс сам создавал свои зависимости (new внутри), ему внедряют нужные объекты через конструктор (или сеттер).

//Без DI:

class UserService {
    private $repo;

    public function __construct() {
        $this->repo = new MySqlUserRepository(); // Зашито жёстко
    }
}

 //С DI:

 class UserService {
    private UserRepositoryInterface $repo;

    public function __construct(UserRepositoryInterface $repo) {
        $this->repo = $repo;
    }
}
//Теперь мы можем передать любой класс, реализующий интерфейс — хоть MySQL, хоть MockRepository для тестов.

//💡 DI и Laravel
//Laravel вообще построен на контейнере зависимостей, который сам понимает, что внедрить в конструктор:
// Laravel-style
class TaskController {
    public function __construct(TaskRepositoryInterface $repo) {
        $this->repo = $repo;
    }
}
//Laravel автоматически найдёт реализацию и внедрит.
