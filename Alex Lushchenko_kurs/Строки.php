<?php

//-----String in PHP-----
echo "\n----------String in PHP-----------\n";

$s = "Twin Peaks";

//Перебор строки

$out = '';
for ($i = 0; $i < strlen($s); $i++){
    $out .= $s[$i].'-';
}
echo $out."\n";
