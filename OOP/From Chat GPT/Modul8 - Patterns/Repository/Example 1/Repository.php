<?php

// Паттерн Repository — "Прослойка между бизнес-логикой и данными"

// 🧠 Зачем он нужен?
// Паттерн Repository позволяет отделить логику работы с базой данных от остального кода.
// Ты создаёшь репозиторий-класс, который как бы "притворяется коллекцией объектов", но внутри использует SQL, PDO или ORM.

//📦 Классическая схема:

interface UserRepositoryInterface {
    public function findById(int $id): ?User;
    public function save(User $user): void;
    public function delete(User $user): void;
}

class MySqlUserRepository implements UserRepositoryInterface {
    public function findById(int $id): ?User {
        // Выполнить SELECT и вернуть объект User
    }

    public function save(User $user): void {
        // INSERT или UPDATE в БД
    }

    public function delete(User $user): void {
        // DELETE
    }
}

class UserService {
    private UserRepositoryInterface $repo;

    public function __construct(UserRepositoryInterface $repo) {
        $this->repo = $repo;
    }

    public function removeUser(int $id): void {
        $user = $this->repo->findById($id);
        if ($user) {
            $this->repo->delete($user);
        }
    }
}

// 🤖 Что даёт Repository:
// Отделяет бизнес-логику от инфраструктурной
// Можно легко заменить, например, MySQL на MongoDB
// Упрощает тестирование (можно замокать репозиторий)
// Улучшает читаемость и масштабируемость
