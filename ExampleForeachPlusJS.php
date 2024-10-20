<?php

//Массив элементов для меню
$menu = Array("item", "item", "item", "item", "item");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            margin: 0 auto;
            width: 60%;
        }
        ul{
            list-style-type: none;
        }
        .link{
            font-size: 25px;
        }
        .color-red{
            color: red;
        }
    </style>
    <script>
        /* Пример интеграции JS-кода в HTML, а также применение PHP в JS */
        window.addEventListener('load', function(){
            //// Используем json_encode для преобразования массива PHP в формат JSON для JavaScript
            const menuItems = <?php echo json_encode($menu); ?>;
            console.log(menuItems);

            let itemMenu = document.querySelectorAll(".link");
            console.log(itemMenu);

            //Пример forEach для ссылок в меню
            itemMenu.forEach(function(link, index){
                
                link.addEventListener("click", function(){
                    link.classList.toggle("color-red");
                })
            })
        })

    </script>
</head>
<body>
    <div class="container">
        <!-- Формируем меню из массива с помощью PHP -->
        <?php foreach($menu as $index => $item): ?>
            <ul>
                <?php echo ("<li class='menu-item'><a class='link' href='#'>" . $item . "-" . ($index + 1) . "</a></li>") ?>
            </ul>
        <?php endforeach; ?>
    </div>
</body>
</html>