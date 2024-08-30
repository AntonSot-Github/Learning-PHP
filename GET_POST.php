
<?php  
    function dump($data){
        echo "<pre>" . print_r($data, 1) . "</pre>";
    }
    //Проверяем массив POST на пустоту и 
    //если массив пуст, мы его не выводим на страницу
    if(!empty($_POST)){
        dump($_POST);
        //Проверяем, существует ли элемент-ключ 'choise' в POST
        if(isset($_POST['choise'])){
            echo 'choosed AGREE', "\n";
        }else{
            echo 'choosed NOT AGREE', "\n";
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Form-Example</title>
    <style>
        h1{
            text-align: center;
        }
        .form-wrapper{
            display: flex;
            justify-content: center;
            width: 100vw;
            background-color: pink;
        }
        form{
            width: 50%;
        }
    </style>
</head>
<body>
    <h1>Form-Example</h1>
    <div class="form-wrapper">
        <form action="" method="post">

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="name" class="form-control" id="name" placeholder="Name" name="name">
            </div>

            <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <input type="Email" class="form-control" id="Email" placeholder="name@example.com" name="Email">
            </div>

            <div class="mb-3">
                <label for="Text" class="form-label">Your text</label>
                <textarea class="form-control" id="Text" rows="3"  placeholder="Your text is here" name="text"></textarea>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="Agree" name="choise">
                <label class="form-check-label" for="Agree">
                    Agree?
                </label>
            </div>

            <select class="form-select mb-3" aria-label="Default select example" name="language">
                <option selected>Select the language</option>
                <option value="English">English</option>
                <option value="Fr">French</option>
                <option value="De">German</option>
            </select>

            <button type="submit" name="send-form" class="btn btn-primary mb-3">
                Send
            </button>
            
        </form>

        
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>