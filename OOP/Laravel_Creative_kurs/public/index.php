<?php 

    if(file_exists("./vendor/autoload.php")){
        require_once ("./vendor/autoload.php");
    } else {
        echo "file is not connected";
    }

    $worker = new \App\Worker('boris', 20, [5, 6, 10]);
    //$visitor = new \App\Visitor();
    //$worker->work();
    //$visitor->visit();
    $developer = new \App\Developer('Doris', 25, [7, 12, 10]);

    //var_dump($developer);
    //$developer->work();

    $developer->setPositionInFuture('main-developer');
    var_dump($developer->getPositionInFuture());