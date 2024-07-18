<?php
//Операторы SWITCH/CASE для сравнения переменной с чем либо 

$role = "user";

switch ($role){
    case "admin":
        echo "full control", "\n";
        break;
    case "moderator":
        echo "manage articles and comments", "\n";
        break;
    case "user":
        echo "write comments to articles", "\n";
        break;
    default:
        echo "role is underfined", "\n";
}