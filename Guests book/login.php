<?php

require_once __DIR__ . '/incs/db.php';

?>


<?php

require_once __DIR__ . '/views/incs/header.tpl.php'

?>

      <!-- Сообщение об ошибке регистрации -->
      <div class="container">
        <div class="row">

          <div class="col-md-6 offset-md-3">

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              Error!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              Success!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <form action="">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="password" class="form-control" id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>

          </div>
        </div>

      </div>




<?php require_once __DIR__ . '/views/incs/footer.tpl.php' ?>