<?php

use App\Student;
if(file_exists("../vendor/autoload.php")){
    require_once ("../vendor/autoload.php");
} else {
    echo "file is not connected", "\n";
}

$student1 = new Student("Alena", 22);
$student2 = new Student("Ivan", 33);

$student1->setUniver("MGU");
//print_r($student1);
print_r($student1->getUniver());
//print_r($student2);

