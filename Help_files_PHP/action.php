<?php  
    function dump($data){
        echo "<pre>" . print_r($data, 1) . "</pre>";
    }
    //Проверяем массив POST на пустоту и 
    //если массив пуст, мы его не выводим на страницу
    if(!empty($_POST)){
        dump($_POST);
        //Проверяем, существует ли элемент-ключ 'choise' в POST
        if(isset($_POST['choise'])){
            echo 'choosed AGREE', "\n";
        }else{
            echo 'choosed NOT AGREE', "\n";
        }
    }
    dump($_GET);
?>