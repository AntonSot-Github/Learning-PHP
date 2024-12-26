<?php

//-----Объявляем трейт-----
trait Logger {
    public function log(string $message): void {
        echo "[LOG]: $message\n";
    }
}

//-----Используем трейт-----
class FileLogger {
    use Logger;
}

class DatabaseLogger {
    use Logger;
}

$fileLogger = new FileLogger();
$fileLogger->log("File log message"); // [LOG]: File log message

$dbLogger = new DatabaseLogger();
$dbLogger->log("Database log message"); // [LOG]: Database log message


//-----Используем несколько трейт-----
trait Logger {
    public function log(string $message): void {
        echo "[LOG]: $message\n";
    }
}

trait ErrorLogger {
    public function logError(string $error): void {
        echo "[ERROR]: $error\n";
    }
}

class Application {
    use Logger, ErrorLogger;
}

$app = new Application();
$app->log("Application started.");  // [LOG]: Application started.
$app->logError("Application crashed."); // [ERROR]: Application crashed.


// ---------Если класс и trait имеют методы с одинаковым именем, приоритет имеет метод класса---------
trait Logger {
    public function log(string $message): void {
        echo "[TRAIT LOG]: $message\n";
    }
}

class Application {
    use Logger;

    public function log(string $message): void {
        echo "[CLASS LOG]: $message\n";
    }
}

$app = new Application();
$app->log("Hello"); // [CLASS LOG]: Hello



//-----------Если два traits содержат методы с одинаковым именем, нужно указать, какой использовать.------------------
trait Logger {
    public function log(): void {
        echo "Trait Logger\n";
    }
}

trait FileLogger {
    public function log(): void {
        echo "Trait FileLogger\n";
    }
}

class Application {
    use Logger, FileLogger {
        Logger::log insteadof FileLogger; // Используем метод из Logger
        FileLogger::log as fileLog;       // Переименовываем метод FileLogger
    }
}

$app = new Application();
$app->log();       // Trait Logger
$app->fileLog();   // Trait FileLogger



//----------Пример из реальной жизни----------------
trait Logger {
    public function log(string $message): void {
        echo "[LOG]: $message\n";
    }
}

trait Validator {
    public function validateEmail(string $email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}

class User {
    use Logger, Validator;

    private string $email;

    public function setEmail(string $email): void {
        if ($this->validateEmail($email)) {
            $this->email = $email;
            $this->log("Email set to $email");
        } else {
            $this->log("Invalid email: $email");
        }
    }
}

$user = new User();
$user->setEmail("test@example.com"); // [LOG]: Email set to test@example.com
$user->setEmail("invalid-email");   // [LOG]: Invalid email: invalid-email
