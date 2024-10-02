<?php
session_start();

$title = 'Login';//Наименование страницы
require_once __DIR__ . '/vendor/autoload.php';//подключение библиотеки для валидации
require_once __DIR__ . '/incs/db.php';
require_once __DIR__ . '/incs/functions.php';

//В случае, если залогинились или зарегались, перенаправляемся на главную страницу
if (check_auth()){
  redirect('index.php');
}

//проверка корректности полей формы, чтобы пользователь не мог подделать форму через html/css страницы
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $data = load(['email', 'password']);

  //Валидация на обязательность заполнения всех полей
  // -/- для email правильность заполнения
  //минимальная длина строки для пароля(6 символов)
  //максимальная длина строки для пароля и email
  $v = new Valitron\Validator($data);
  $v->rules([
    'required' => ['email', 'password'],
    'email' => ['email'],
  ]);

  if ($v->validate()){
    if (login($data)){
      redirect('index.php');
    } else {
      redirect('login.php');//перенаправляем на ту же страницу, чтобы в полях остались введенные данные
    }
  } else {
    $_SESSION['errors'] = get_errors($v->errors());
  }
}

?>


<?php

require_once __DIR__ . '/views/incs/header.tpl.php'

?>

      <!-- Сообщение об ошибке регистрации -->
      <div class="container">
        <div class="row">

        <div class="col-md-6 offset-md-3">

            <?php if (isset($_SESSION['errors'])): ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php 
                  echo $_SESSION['errors'];//вывести сообщение об ошибке
                  unset($_SESSION['errors']);//сразу очистить $_SESSION['success'] после обновления страницы
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif ?>

            <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?php 
                echo $_SESSION['success'];//вывести сообщение об ошибке
                unset($_SESSION['success']);//сразу удалить после обновления страницы
              ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif ?>

            <form method="post">
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>

          </div>
        </div>

      </div>




<?php require_once __DIR__ . '/views/incs/footer.tpl.php' ?>