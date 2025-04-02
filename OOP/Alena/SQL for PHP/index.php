<?php

if(file_exists("db.php")){
    include_once "db.php";
} else {
    echo "DB is not connected";
}

function creatTable(){
    global $db;
}