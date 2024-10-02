<?php

//Выход из учетной записи путем удаления данных из сессии и
//перенаправление на главную страницу
if (isset($_GET['do']) && $_GET['do'] == 'logout'){
  unset($_SESSION['user']);
  redirect('index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestsbook: <?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style href="style.css"></style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">Home</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="d-flex justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <!-- Если пользователь не авторизован, то выводим код ниже -->
              <?php if (!check_auth()): ?>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="register.php">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>
              <!-- Если авторизован, то выводим это -->
              <?php else: ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Hello, <?php echo ($_SESSION['user']['name']) ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <!-- Создаем GET-запрос для использования для выхода из учетной записи -->
                  <li><a class="dropdown-item" href="?do=logout">logout</a></li>
                </ul>
              </li>
              <?php endif; ?>
            </ul>
  
          </div>
        </div>
    </nav>