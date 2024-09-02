<?php 
    function dump($data){
      echo "<pre>" . print_r($data, 1) . "</pre>";
    }
    //Проверяем на наличие имени файла в глобальном массиве и
    //на отсутствие ошибки при загрузке
    if (isset($_FILES['userfile']) && $_FILES['userfile']['error'] === 0){
      //Проверяем успешность перемещения файла,
      //затем перенаправляем пользователя на ту же страницу(header) и завершаем работу скрипта(exit)
      if(move_uploaded_file($_FILES['userfile']['tmp_name'], __DIR__ . "/Help_files_PHP/test.png")){
        header("Location: Load_files.php");
        exit;
      };
    }
    
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Load files</title>
    <style>
      h1{
        text-align: center;
      }
      .form-wrapper{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100vw;
        background-color: pink;
        margin-bottom: 30px;
        height: 300px;
      }
      form{
        width: 40vw;
      }
      form *{
        margin-bottom: 15px;        
      }
    </style>
</head>
<body>
  
  <div class="form-wrapper">
    <h1>Load files</h1>
    <form enctype="multipart/form-data" action="" method="post">

      <div class="form-name">
        <label for="name" class="form-label">Name</label>
        <input type="name" class="form-control" id="name" placeholder="Name" name="name">
      </div>

      <div class="form-file">
        <input name="userfile" type="file" class="form-file-input" id="customFile">
        <label class="form-file-label" for="customFile"></label>
      </div>

      <button type="submit" class="btn btn-primary mb-3">
        Send
      </button>

    </form>

  </div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>

