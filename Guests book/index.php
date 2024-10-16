<?php
session_start();

$title = 'Home';//Наименование страницы

require_once __DIR__ . '/vendor/autoload.php';//подключение библиотеки для валидации
require_once __DIR__ . '/incs/db.php';
require_once __DIR__ . '/incs/functions.php';
require_once __DIR__ . '/incs/Pagination.php';

//Валидация сообщения от пользователя и запись ошибки в $_SESSION['errors'] в случае, если 
//попытались риправить пустое сообщение
if (isset($_POST['send-message'])){
  $data = load(['message', 'id']);
  $v = new Valitron\Validator($data);
  $v->rules([
    'required' => ['message'],
  ]);
  if ($v->validate()){
    if (save_message($data)){
      redirect('index.php');
    }
  } else {
    $_SESSION['errors'] = get_errors($v->errors());
  }
}

if (isset($_POST['edit-message'])){
  $data = load(['message', 'id', 'page']);
  $v = new Valitron\Validator($data);
  $v->rules([
    'required' => ['message', 'id'],
    'integer' => ['id', 'page'],
  ]);
  if ($v->validate()){
    if (edit_message($data)){
      redirect("index.php?page={$data['page']}#message-{$data['id']}");//перенаправление на ту же страницу и на то сообщение(по якорю), которое отредактировали
    }
  } else {
    $_SESSION['errors'] = get_errors($v->errors());
  }
}

if (isset($_GET['do']) && $_GET['do'] == 'toggle-status'){
  $id = $_GET['id'] ?? 0;
  //Помещаем в переменную результат GET-запроса 
  $status = isset($_GET['status']) ? (int)$_GET['status'] : 0;
  toggle_message_status($status, $id);
  $page = isset($_GET['page']) ? "?page=" . (int)$_GET['page'] : "?page = 1";
  //Перенаправляем на ту же страницу после модерации сообщения
  //#message-{$id} - центрируем экран на сообщении, которое отмодерировали, с помощью # - якоря
  redirect("index.php{$page}#message-{$id}");
}



//Проверяем, существует ли в массиве $_GET элемент page
//Если существует, приводим значение к integer
//Если не существует, создаём эл-т и присваиваем значение 1(первая страница)
$page = $_GET['page'] ?? 1;//аналог $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$per_page = 4;//сколько элементов массива будем выводить на одну страницу
$total = get_count_messages();//количество сообщений всего

//параметры для экземпляра класса:
//1) Кол-во страниц, приведенное к integer
//2) Кол-во сообщений, отображаемых на одной странице
//3) количество сообщений всего
$pagination = new Pagination((int) $page, $per_page, $total);
$start = $pagination->getStart();//оффсет - элемент, с которого начинается показ записей на странице



$messages = get_messages($start, $per_page);//все сообщения из БД



?>

<?php require_once __DIR__ . '/views/incs/header.tpl.php' ?>
      <!-- Сообщение об ошибке или успехе регистрации -->
      <div class="container">
        <div class="row">

          <div class="col-12 mb-4">

            <!-- Сообщение об успешной отправке сообшения из формы -->
            <?php if (isset($_SESSION['success'])): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php 
                  echo $_SESSION['success'];//вывести сообщение об отправке сообщения
                  unset($_SESSION['success']);//сразу удалить после обновления страницы
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php endif ?>
              

              <!-- Сообщение об ошибке при отправке сообшения из формы -->
              <?php if (isset($_SESSION['errors'])): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <?php 
                    echo $_SESSION['errors'];//вывести сообщение об ошибке отпраки сообщения
                    unset($_SESSION['errors']);//сразу очистить $_SESSION['Message is required'] после обновления страницы
                  ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>

          </div>

            <!-- Скрываем форму, пока пользователь не авторизуется -->
            <?php if (check_auth()): ?>
              <form class="mb-2" method="post">

                <div class="form-floating mb-2">
                  <textarea name="message" class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;"></textarea>
                  <label for="floatingTextarea">Comments</label>
                </div>

                <button name="send-message" type="submit" class="btn btn-primary">Send</button>

              </form>

              <hr>
            <?php endif; ?>
        </div>


        <div class="row">
          <div class="col-12">

            <?php if(!empty($messages)): ?>
              <?php foreach($messages as $message): ?>
               

                  <div class="card mb-3 <?php if(!$message['status']) echo 'border-danger'?>" id="message-<?php echo $message['id'] ?>">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <h5 class="card-title"><?php echo $message['name'] ?></h5>
                        <p class="massage-created"><?php echo $message['created_at2'] ?></p>
                      </div>

                      <div class="card-text">
                        <?php echo nl2br(h($message['message']))//выводим сообщение и применяем функции для удаления html-тэгов и перевода строк ?>
                      </div>

                      <div class="card-action">
                        <!-- Если админ, то показываем кнопки -->
                        <?php if(check_adm()): ?>
                          <p>
                            <?php if ($message['status'] == 1): ?>
                              <!-- В  href формируем GET-запрос, где ?page= - остаться на той же странице,
                              toggle-status&status=0 - присваиваем изменение статуса и изменяем статус на 0,
                              &id= присваиваем сообщению номер id  -->
                              <a href="?page=<?= $page ?>&do=toggle-status&status=0&id=<?= $message['id'] ?>">Disable</a> |
                            <?php else: ?>
                              <a href="?page=<?= $page ?>&do=toggle-status&status=1&id=<?= $message['id'] ?>">Approve</a> |
                            <?php endif; ?>
                            

                            <a data-bs-toggle="collapse" href="#collapse-<?php echo $message['id'] ?>" role="button" aria-expanded="false">Edit</a>
                          </p>
                        <?php endif ?>

                        <div class="collapse" id="collapse-<?php echo $message['id'] ?>">

                          <form method="post">

                            <div class="form-floating mb-2">
                              <textarea name="message" class="form-control" placeholder="Leave a comment here" id="message-<?php echo $message['id'] ?>" style="height: 100px;"><?php echo $message['message'] ?></textarea>
                              <label for="message-<?php echo $message['id'] ?>">Comments</label>
                            </div>

                            <!-- Скрытое поле формы -->
                            <input type="hidden" name="id" value="<?= $message['id'] ?>">
                            <input type="hidden" name="page" value="<?= $_GET['page'] ?? 1 ?>">

                            <button name="edit-message" type="submit" class="btn btn-primary">Save</button>

                          </form>

                        </div>
                      </div>

                    </div>
                  </div>
              <?php endforeach; ?>
            <?php else: ?>
                <p>Messages are not found</p>

            <?php endif ?>
            
          </div>
        </div>
        
        <?php if (!empty($messages)): ?>
        <div class="row">
          <div class="col-12">
            <!-- Класс сам строит разметку пагинации через bootstrap -->
            <?= $pagination ?>
          </div>
        </div>
        <?php endif; ?>



      </div>



<?php require_once __DIR__ . '/views/incs/footer.tpl.php' ?>