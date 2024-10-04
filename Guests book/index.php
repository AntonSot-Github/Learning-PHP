<?php
session_start();

$title = 'Home';//Наименование страницы

require_once __DIR__ . '/vendor/autoload.php';//подключение библиотеки для валидации
require_once __DIR__ . '/incs/db.php';
require_once __DIR__ . '/incs/functions.php';

//Валидация сообщения от пользователя и запись ошибки в $_SESSION['errors'] в случае, если 
//попытались риправить пустое сообщение
if (isset($_POST['send-message'])){
  $data = load(['message']);
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

$messages = get_messages();//все сообщения из БД
dump($messages);


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
                            <a href="#">Disable</a> |
                            <a href="#">Approve</a> |
                            <a data-bs-toggle="collapse" href="#collapse-<?php echo $message['id'] ?>" role="button" aria-expanded="false">Edit</a>
                          </p>
                        <?php endif ?>

                        <div class="collapse" id="collapse-<?php echo $message['id'] ?>">

                          <form action="">

                            <div class="form-floating mb-2">
                              <textarea class="form-control" placeholder="Leave a comment here" id="message-<?php echo $message['id'] ?>" style="height: 100px;"><?php echo $message['message'] ?></textarea>
                              <label for="message-<?php echo $message['id'] ?>">Comments</label>
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>

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

        <div class="row">
          <div class="col-12">
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
              </ul>
            </nav>
          </div>
        </div>



      </div>



<?php require_once __DIR__ . '/views/incs/footer.tpl.php' ?>