<?php

//Task 1: Создай массив $users, где ключом будет логин, а значением — имя.
    $users = [
        "tuziaka@mail.com" => "Tuziaka",
        "gosia@mail.coom" => "gosia",
        "frosia@mail.com" => "frosia",
    ];

    echo "Task 1: \n";
    foreach($users as $email => $name){
        print_r("User with $email is $name. \n"); 
    }

//Task 2: Создай массив $products, где ключ — это название товара, а значение — массив с полями price и count.
    $products = [
        "Apples" => ["price" => 4.1, "count" => 10],
        "Oranges" => ["price" => 4.8, "count" => 8],
        "Bananas" => ["price" => 6.99, "count" => 3]
    ];

    echo "\nTask 2: \n";
    foreach($products as $fruit => $paid){
        echo "Paid for $fruit: " . $paid['price'] * $paid['count'] . "\n";
    }

//Task 3: С помощью foreach увеличь каждому зарплату на 10% и выведи в консоль
    $employees = [
        "Антон" => 2500,
        "Мария" => 3100,
        "Илья" => 2800
    ];

    echo "\nTask 3: \n";
    foreach($employees as $employee => $salary){
        echo "$employee: " . $salary + $salary * 0.1 . "\n";
    }

//Task 4: С помощью foreach создай новый ассоциативный массив $lettersCount,
        //где ключ — это слово, а значение — количество букв в нём. 
    echo "\nTask 4: \n";
    $words = ["дом", "работа", "день", "машина"];
    $lettersCount = [];
    foreach($words as $word){
        $lettersCount[$word] = mb_strlen($word);        
    }
    print_r($lettersCount);

//Task 5: Рейтинг пользователей. Используя foreach, пройди по массиву и выведи для каждого строку Рома набрал 120 очков
    echo "\nTask 5: \n";
    $users = [
        ["name" => "Рома", "points" => 120],
        ["name" => "Аня", "points" => 155],
        ["name" => "Илья", "points" => 98]
    ];
    foreach($users as $user){
        $str = $user['name'] . " набрал " . $user['points'] . " очков ";
        if($user['points'] > 100){
            echo $str . "- молодец \n";
        } else {
            echo $str . "\n";
        }
    }
