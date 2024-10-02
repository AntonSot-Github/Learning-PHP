<?php
session_start();

$title = 'Home';//Наименование страницы

require_once __DIR__ . '/vendor/autoload.php';//подключение библиотеки для валидации
require_once __DIR__ . '/incs/db.php';
require_once __DIR__ . '/incs/functions.php';

?>

<?php require_once __DIR__ . '/views/incs/header.tpl.php' ?>
      <!-- Сообщение об ошибке или успехе регистрации -->
      <div class="container">
        <div class="row">

          <div class="col-12 mb-4">

          <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?php 
                echo $_SESSION['success'];//вывести сообщение об ошибке
                unset($_SESSION['success']);//сразу удалить после обновления страницы
              ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif ?>

          </div>

          <form action="" class="mb-2">

            <div class="form-floating mb-2">
              <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 5%;"></textarea>
              <label for="floatingTextarea">Comments</label>
            </div>

            <button type="submit" class="btn btn-primary">Send</button>

          </form>

          <hr>

        </div>


        <div class="row">
          <div class="col-12">

            <div class="card mb-3">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <h5 class="card-title">User 1</h5>
                  <p class="massage-created">2024-07-23 12:10</p>
                </div>

                <div class="card-text"></div>

                <div class="card-action">

                  <p>
                    <a href="#">Disable</a> |
                    <a href="#">Approve</a> |
                    <a data-bs-toggle="collapse" href="#collapse-1" role="button" aria-expanded="false" aria-controls="collapse-1">Edit</a>
                  </p>

                  <div class="collapse" id="collapse-1">

                    <form action="">

                      <div class="form-floating mb-2">
                        <textarea class="form-control" placeholder="Leave a comment here" id="message-1" style="height: 100px;">Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.</textarea>
                        <label for="message-1">Comments</label>
                      </div>

                      <button type="submit" class="btn btn-primary">Save</button>

                    </form>

                  </div>
                </div>

              </div>
            </div>

            <div class="card mb-3">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <h5 class="card-title">User 2</h5>
                  <p class="massage-created">2024-07-25 16:20</p>
                </div>

                <div class="card-text"></div>

                <div class="card-action">

                  <p>
                    <a href="#">Disable</a> |
                    <a href="#">Approve</a> |
                    <a href="#collapse-2" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapse-2">Edit</a>
                  </p>

                  <div class="collapse" id="collapse-2">

                    <form action="">

                      <div class="form-floating mb-2">
                        <textarea class="form-control" placeholder="Leave a comment here" id="message-2" style="height: 100px;">Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.</textarea>
                        <label for="message-2">Comments</label>
                      </div>

                      <button type="submit" class="btn btn-primary">Save</button>

                    </form>

                  </div>
                </div>

              </div>
            </div>
            
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