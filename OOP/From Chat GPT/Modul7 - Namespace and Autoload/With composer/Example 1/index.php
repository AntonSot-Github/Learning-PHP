<?php

require __DIR__ . '/vendor/autoload.php';

use App\Hello\Greeter;

$greeter = new Greeter();
$greeter->greet('Кодозавр');
