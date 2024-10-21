<?php 
session_start();
require_once __DIR__. '/php/functions.php';

//Страница
// Проверка, передан ли параметр 'page' через GET. Если передан, сохраняем его, иначе устанавливаем значение 1 (страница по умолчанию)
$page = isset($_GET['page']) ? $_GET['page'] : 1;

saveGet($page);// Сохранение текущего номера страницы в файл через функцию saveGet
// Функция для сохранения номера страницы в файл get.txt
function saveGet($data){
    $file2 = __DIR__ . '/php/get.txt';// Определяем путь к файлу get.txt
    file_put_contents($file2, $data);// Записываем номер страницы в файл
}

// Получаем содержимое файла messages.txt, где хранятся сообщения
$file = file_get_contents(__DIR__ . '/php/messages.txt');

// Разбиваем содержимое файла на массив, используя запятую как разделитель
$arrMsg = explode(",", $file);

// Получаем путь и содержимое файла get.txt (с сохраненным номером страницы)
$file2 = __DIR__ . '/php/get.txt';
$fileGet = file_get_contents($file2);

// Определяем страницу
$page = isset($_GET['page']) ? $_GET['page'] : 1;


//Количество выводимых сообщений на странице
$nMsg = 3;

//Количество требуемых страниц для отображения всех сообщений
$page_count = ceil(count($arrMsg) / $nMsg); // Округляем количество страниц в большую сторону

// Функция для добавления сообщения
function addMsg($data){
    $file = __DIR__ . '/php/messages.txt';
    file_put_contents($file, ', ' . $data, FILE_APPEND);
}

// Если отправлено сообщение (через POST) и оно не пустое, обрабатываем его
if(isset($_POST['message']) && ($_POST['message'] !== "")){
    $message = nl2br(htmlspecialchars(trim($_POST['message']))); // Преобразуем спецсимволы и убираем лишние пробелы
    addMsg($message); // Добавляем сообщение через функцию addMsg
    // Перенаправляем пользователя на последнюю страницу, если количество сообщений кратно количеству сообщений на странице
    if((count($arrMsg) % $nMsg) === 0){
        header("Location: index.php?page=" . ($page_count+1));
        exit; // Останавливаем выполнение скрипта
    } else {
        header("Location: index.php?page={$page_count}");
        exit;
    }
}

//Функция удаления сообщения
if (isset($_GET['do']) && $_GET['do'] == 'delete'){
    $msg_id = $_GET['id']; // Получаем ID сообщения, которое нужно удалить
    unset($arrMsg[$msg_id]); // Удаляем сообщение из массива
    $file = __DIR__ . '/php/messages.txt'; // Путь к файлу с сообщениями
    file_put_contents($file, implode(',', $arrMsg)); // Записываем обновленный массив обратно в файл
    // Если количество сообщений не делится нацело на количество сообщений на странице
    if (count($arrMsg) % $nMsg !== 0){
        header("Location: index.php?page={$_GET['page']}");
        exit;
    } else {
        header("Location: index.php?page=" . $_GET['page'] - 1);
        exit;
    }

}

// Функция сохранения отредактированного сообщения
// Проверяем, было ли отправлено редактирование сообщения через POST
if (isset($_POST['edit']) && ($_POST['edit'] !== "")){
    global $page, $fileGET; // Используем глобальные переменные
    $msg_id = $_POST['id']; // Получаем ID редактируемого сообщения
    $arrMsg[$msg_id] = nl2br(htmlspecialchars(trim($_POST['edit']))); // Обрабатываем и сохраняем отредактированное сообщение
    $file = __DIR__ . '/php/messages.txt'; // Путь к файлу с сообщениями
    file_put_contents($file, implode(',', $arrMsg)); // Записываем обновленный массив сообщений обратно в файл
    unset($_POST); // Очищаем массив POST
    header("Location: index.php?page={$fileGet}"); // Перенаправляем пользователя на страницу, которая была сохранена ранее
    exit;
}

/* echo ceil(count($arrMsg) / $nMsg), "<br>";
echo count($arrMsg), "<br>";
echo '$page = ' . $page, "<br>";
echo '$fileGet = ' . $fileGet, "<br>";
print_r($_GET); */



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My alternative forum</title>
    <link rel="stylesheet" href="css/style.css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            let msgEditBtn = document.querySelectorAll(".edit-btn");

            msgEditBtn.forEach(function(btn, index) {
                btn.addEventListener("click", function() {

                // Найдем родительский элемент message-box для данной кнопки
                let messageBox = btn.closest(".message-box");

                // Внутри этого message-box найдем элемент с классом msg-editor
                let editor = messageBox.querySelector(".msg-editor");

                let saveBtn = messageBox.querySelector(".saveBtn");

                if (saveBtn) {
                saveBtn.classList.toggle("display-none");
                }

                // Тогглим класс только у этого элемента
                if (editor) {
                    editor.classList.toggle("non-display");
                    editor.classList.toggle("opacity-0");
                }
        });
    });
        })
    </script>
</head>
<body>
    <div class="container">
        <h2>Altenative forum</h2>
        <h1>WELCOME</h1>
        <?php foreach($arrMsg as $index => $item): ?>
            <!-- Условие отображения сообщений на странице по пагинации:
             ($index >= $nMsg * $page - $nMsg) - от какого элемента начинается цикл -> 
             кол-во сообщений * номер страницы - номер страницы
             Пример для первой страницы: 3 * 1 - 3 = 0. Цикл начинается с элемента с индексом 0
             Пример для второй страницы: 3 * 2 - 3 = 3. Цикл начинается с 3. 
             ($index <= $nMsg * $page - 1) - на каком элементе заканчивается
             Пример для первой страницы: 3 * 1 - 1 = 2. Цикл заканчивается на элементе с индексом 2.
             Пример для второй страницы: 3 * 2 - 1 = 5. Цикл заканчивается на элементе с индексом 5.
            -->
            <?php if(!empty($arrMsg[$index]) && ($index >= $nMsg * $page - $nMsg) && ($index <= $nMsg * $page - 1)): ?>
                <div class="message-box">


                    <p class="message-number">Message - <?php echo ($index + 1) ?></p>
                    <p class="message"> <?= $item ?> </p>

                    <div class="message-links">
                        <a class="edit-btn" href="#">Edit</a>
                        <a href="?do=delete&id=<?php echo($index)?>&page=<?php echo $page?>">Delete</a>
                    </div>

                    <form class="message-edition" method="post" >
                        <textarea method="post" class="msg-editor message-edition-text non-display opacity-0" name="edit" id="message-edit-msg-<?php echo($index + 1)?>"><?php echo trim($item) ?></textarea>
                        <!-- Добавляю скрытое поле для передачи еще одного ключа(id) и его значения (value)
                        в массив POST -->
                        <input type="hidden" name = "id" value = <?php echo($index)?>>
                        <button class="saveBtn display-none" type="submit">Save</button>
                    </form>



                    
                </div>
            <?php endif; ?>
        <?php endforeach; ?>

        <form class="message-text" method="post">
            <textarea name="message" id="mes-1" placeholder="Your message"></textarea>
            <input class="btn-inp" type="submit" value="Send the message">
        </form>

        <div class="pagination">
            <!-- Если количество сообщений больше, чем количество отбражаемых сообщений, то включаем пагинацию -->
            <?php if(count($arrMsg) > $nMsg): ?>
                <?php for($i = 1; $i <= $page_count; $i++): ?>
                    <a class="pagination__item" href="?page=<?php echo $i ?>"><?php echo ($i) ?></a>
                <?php endfor; ?>
            <?php endif; ?>
        </div>


    </div>

</body>
</html>