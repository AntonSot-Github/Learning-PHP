<?php
function zeroingCounter(){
    $count = file_get_contents("count.txt");
    $count = 0;    
    file_put_contents("count.txt", $count);
    header("Location: ../Counter of visits.php");
    die;
}
zeroingCounter();
?>