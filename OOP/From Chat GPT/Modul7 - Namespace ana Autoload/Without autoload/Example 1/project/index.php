<?php

require_once "classes/Helpers/StringHelper.php";
require_once "classes/Models/User.php";

use classes\Models\User;
use classes\Helpers\StringHelper;

//С использованием namespace
//$user = new \classes\Models\User("Alice");

//Без использования namespace
//$user = new \User("Alice");

$user = new User("Alice");
echo $user->sayHello();
echo StringHelper::upper($user->name);