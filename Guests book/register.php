<?php

require_once __DIR__ . '/vendor/autoload.php';//подключение библиотеки для валидации
require_once __DIR__ . '/incs/db.php';
require_once __DIR__ . '/incs/functions.php';

//dump($_SERVER); //распечатка глобального массива

//проверка корректности полей формы, чтобы пользователь не мог подделать форму через html/css страницы
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $data = load(['name', 'email', 'password']);
  //Валидация на обязательность заполнения всех полей
  // -/- для email правильность заполнения
  // минимальная длина строки для пароля(6 символов)
  //максимальная длина строки для пароля и email
  $v = new Valitron\Validator($data);
  $v->rules([
    'required' => ['name', 'email', 'password'],
    'email' => ['email'],
    'lengthMin' => [
      ['password', 6]
    ],
    'lengthMax' => [
      ['name', 50],
      ['email', 50]
    ],
  ]);
  if ($v->validate()){
    echo 'OK';
  } else {
    dump($v->errors());
  }
}


?>


<?php

require_once __DIR__ . '/views/incs/header.tpl.php';

?>
      <!-- Сообщение об ошибке регистрации -->
      <div class="container">
        <div class="row">

          <div class="col-md-6 offset-md-3">

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              Error!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <form action="" method="post">
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control" id="name" placeholder="your name" value="<?php old('name') ?>">
                    <label for="name">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" value="<?php old('email') ?>">
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?php old('password') ?>">
                    <label for="password">Password</label>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>

          </div>
        </div>

      </div>


<?php require_once __DIR__ . '/views/incs/footer.tpl.php'; ?>