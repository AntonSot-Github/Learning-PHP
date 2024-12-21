<?php
    require_once __DIR__ . "/incs/functions.php";
    
    $title = 'main';

    //------Кол-во дней с момента регистрации-----
    //time() - время в сек от старта эпохи
    //strtotime($_SESSION['user_reg_date']) - переводит в секунды(со момента старта эпохи) дату регистрации 
    //intval - возвращает целую часть | 86400 - количество секунд в одних сутках
    if(isset($_SESSION['user_reg_date'])){
        $daysPassReg = intval((time() - strtotime($_SESSION['user_reg_date'])) / 86400);
    } 
    

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        if(isset($_POST['topicName']) && !empty($_POST['topicName']) && !isset($_POST['chooseTopic'])){
            $topicName = htmlspecialchars(trim($_POST['topicName']));
            createTopic($_SESSION['user_id'], $topicName, $_SESSION['user']);
            header("Location: index.php");
            exit;
        }

        // Добавление нового поста для новой или уже существующей темы
        if(isset($_POST['chooseTopic'])){

            if($_POST['chooseTopic'] == 'exist'){
                $topicName = $_POST['selectTopic'];
                $postText = $_POST['postMsg'];
                $picturePath = 'uploads/' . time() . $_FILES['userPicture']['name'];
                move_uploaded_file($_FILES['userPicture']['tmp_name'], $picturePath);
                $topicId = findId($topics, $topicName); //находим индекс для топика, который выбран в форме
                publicPost($topicId, $postText, $picturePath);
                header("Location: index.php");
                exit;
            } elseif ($_POST['chooseTopic'] == 'newOne'){
                $topicName = $_POST['topicName'];
                createTopic($_SESSION['user_id'], $topicName);                
                $topicId = mysqli_insert_id($db); // Получаем id добавленной темы
                $postText = $_POST['postMsg'];
                $picturePath = 'uploads/' . time() . $_FILES['userPicture']['name'];
                move_uploaded_file($_FILES['userPicture']['tmp_name'], $picturePath);
                publicPost($topicId, $postText, $picturePath);
                header("Location: index.php");
                exit;
            }}
        
        //Changing email
        if(!empty($_POST["changeEmail"])){
            // Подготовка запроса
            $stmt = mysqli_prepare($db, "UPDATE `users` SET email = ? WHERE name = ?");
            if($stmt){
                mysqli_stmt_bind_param($stmt, "ss", $_POST["changeEmail"], $userName);
                if(mysqli_execute($stmt)){
                    $_SESSION['user_email'] = $_POST["changeEmail"];
                    $_SESSION['success'] = 'Your email is changed';
                    header("Location: index.php");
                    exit;
                } else {
                    $_SESSION['error'] = 'Error: ' . mysqli_stmt_error($stmt);
                    }
                }
            } else {
                $_SESSION['error_edit_email'] = 'Email is invalid';
            }
        
        //Adding or changing telephon number 
        if(!empty($_POST["changeTel"])){
            // Подготовка запроса
            $stmt = mysqli_prepare($db, "UPDATE `users` SET tel = ? WHERE name = ?");
            if($stmt){
                mysqli_stmt_bind_param($stmt, "ss", $_POST["changeTel"], $userName);
                if(mysqli_execute($stmt)){
                    $_SESSION['user_tel'] = $_POST["changeTel"];
                    $_SESSION['success'] = 'Your tel-number is changed';
                    header("Location: index.php");
                    exit;
                } else {
                    $_SESSION['error'] = 'Error: ' . mysqli_stmt_error($stmt);
                    }
                }
            } else {
                $_SESSION['error_edit_email'] = 'Tel-number is invalid';
            }
        
        //Changin avatar
        //Константа UPLOAD_ERR_OK указывает, что идёт проверка на отсутствие ошибок при загрузке файла.
        if (!empty($_FILES['user_ava']) && $_FILES['user_ava']['error'] === UPLOAD_ERR_OK) {



            // Разрешенные типы файлов
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

            // Максимальный размер файла (4MB)
            $maxSize = 4 * 1024 * 1024;

            // Получаем имя файла (basename защищает от включения путей)
            $fileName = basename($_FILES['user_ava']['name']);

            // Создаем уникальное имя файла, используя имя пользователя и текущее время
            $uniqueFileName = $_SESSION['user'] . "_" . time() . "_" . $fileName;

            // Полный путь для сохранения файла
            $picAvaPath = "uploads/" . $uniqueFileName;
        
            // Проверяем, что тип файла допустим
            if (!in_array($_FILES['user_ava']['type'], $allowedTypes)) {
                // Устанавливаем сообщение об ошибке, если тип файла не разрешен
                $_SESSION['error'] = "Only JPG, PNG, and GIF files are allowed.";
            // Проверяем размер файла
            } elseif ($_FILES['user_ava']['size'] > $maxSize) {
                $_SESSION['error'] = "File is too large. Max size is 2MB.";
            // Если тип и размер файла корректны, пробуем переместить файл
            } elseif (move_uploaded_file($_FILES['user_ava']['tmp_name'], $picAvaPath)) {
                if (avaLoad($picAvaPath)) {
                    $_SESSION['user_ava'] = $picAvaPath;
                    $_SESSION['success'] = "New avatar uploaded successfully.";
                    header("Location: index.php");
                    exit;
                } else {
                    $_SESSION['error'] = "We couldn't upload your avatar to the database.";
                }
            } else {
                $_SESSION['error'] = "Error moving the uploaded file.";
            }
        }

            //Delete account
        if(isset($_POST['deleteAccount'])){
            if(accDel()){
                session_destroy();
                header("Location: login.php");
                exit;
            } else {
                $_SESSION['error'] = 'error: account is not deleted';
            }
        }
    }


    //dump($_SESSION);
    //echo $_SESSION['user_ava'];
    //dump($_SESSION['user_reg_date']);
    //dump($posts)
    //dump($_POST);
    //dump($_FILES);
    //dump($byUser);
    //echo $_SESSION['user_ava'];
    
?>


<?php require_once __DIR__ . "/views/header.php" ?>

    <!-- вывод бокового меню выбора тем -->
    <div class="topic-menu">
            <ul class="topic-menu__list">
                <?php foreach($topics as $key => $topic):?> 
                    <li class="topic-menu__item">
                        <a href="#" class="link topic-menu__link" data-topic-id="<?= $key; ?>"><?= $topic ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
    </div>
    
    <!-- Account-window -->
    <?php if(isset($_SESSION['user'])): ?>
        <div class="account no-display">
            <!-- Button for close acc-window -->
            <a href="#" class="account__btn-close account__btn">&#10006</a>

            <!-- Container for errors-show -->
            <div class="error-container">
                <?php if(isset($_SESSION['error'])){
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                } ?>
            </div>

            <h2><?php if(isset($userName)) { echo $userName; }?></h2>

            <div class="account__ava">
                <div>
                    <img src="<?=$_SESSION['user_ava']?>" alt="img">
                    <a class="account__ava-link account__btn" href="#">&#9998</a>
                </div>
                <div class="form-ava no-display">
                    <form method="post" enctype="multipart/form-data">
                        <input name="user_ava" type="file">
                        <button class="btn btn-grad" type="submit">Save</button>
                    </form>
                </div>
            </div>
            <p>Date of registration: <?= $_SESSION['user_reg_date'] ?></p>

            <p>How long with us: <?= $daysPassReg?> days</p>
            <p>Your email: <?= $_SESSION['user_email'] ?> <a id="change-email" class="changeEmail account__btn" href="#">&#9998</a></p>
            
            <div class="account__changeEmail no-display">
                <form id="form-change-email" class="no-display" method="post">
                    
                    <input class="form-input form-input__acc" type="email" name="changeEmail" placeholder="New email">
                    <button class="btn btn-grad" type="submit">Save</button>

                </form>
            </div>

            <p>Status: 
                <?php echo ($_SESSION['user_role'] === 2) ? "Member of club" : "Administrator" ?>
            </p>

            <div class="account__tel ">
                <p> Your telephon-number:
                <?php if(!isset($_SESSION['user_tel'])): ?> 
                        <?= "we haven't your number yet"?> 
                    <?php else:?>
                        <?= $_SESSION['user_tel']?>
                    <?php endif; ?> 
                    <a class="changeTel account__btn" href="#">&#9998</a></p>
                    <div class="account__changeTel no-display">
                        <form id="change-Tel" method="post">
                            <input name="changeTel" class="form-input form-input__acc" type="tel" placeholder="Telephon">
                            <button class="btn btn-grad" type="submit">Save</button>
                        </form>
                    </div>
            </div>
            <!-- Удаление аккаунта -->
            <div class="account__delete">
                <a class="link delAcc account__del-link" href="#">Delete account</a>
                <div class="account__deleteConf no-display">

                    <p>Are you sure?</p>
                    <div class="account__deleteAnswer">
                        <form method="post">
                            <input type="hidden" name="deleteAccount">
                            <button class="account__deleteAnswer--yes">Yes</button>
                        </form>
                        <a class="link account__deleteAnswer--no" href="#">No</a>
                    </div>
                </div>
            </div>
            
        </div>
    <?php endif; ?>

    <!-- Основное содежимое сайта -->
    <div class="container">

        <?php if(empty($topics)): ?>
            <div class="msg 
            <?php echo ((isset($_GET['do']) && $_GET['do'] == 'createTopic') ? 'no-display' : 'display')?>">

                <p>There are no any conversations yet</p>
                <a class="link btn btn-grad btn-msg" href="?do=createTopic">Create a new topic</a>
            </div>
        <?php endif; ?>

        <div class="form-topic <?php echo ((isset($_GET['do']) && $_GET['do'] == 'createTopic') ? 'display' : 'no-display')?>">

            <?php if(isset($_SESSION['user'])): ?>
                <div class="form-topic__box">
                    
                    <form method="post" >
                        <input autocomplete="off" class="form-input form-input__topic" type="text" name="topicName"  placeholder="Name of topic">
                        <button class="btn btn-grad btn-topic" type="submit">Create topic</button>
                    </form>

                </div>

            <?php else: ?>
                    <p>Only autorized users can create new topics. Please log in to our website
                        <em><a class="link link-underlining_left-to-right link__reg" href="login.php">Login</a></em>
                    </p>
            <?php endif; ?>

        </div >
        

        <!-- Вывод постов -->
        <div class="posts">
            <?php foreach($posts as $post): ?>
                <div class="post" data-topic-id="<?=$post['from_topic_id'] ?>">
                    <div class="post__topPart">
                        <p><?= $post['name'] ?></p>
                        <p><?= $post['added_at'] ?></p>
                    </div>
                    <?php if(!empty($post['picture'])): ?>
                        <div class="post__containerImg">
                            <img class="post__img" src="<?= $post['picture'] ?>" alt="img">
                        </div>
                    <?php endif; ?>
                    <div class="post__textPart">
                        <p><?= $post['post_text'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


        <div class="newPost-formBox newPost-formBox__disable">

            <a class="newPost-formBox__btn link btn btn-grad" href="#">New post</a>

            <form class="form-post" method="post" enctype="multipart/form-data">

                <p>Choose the topic or create yours</p>
                <div class="form-post__choose-box">
                
                    <?php if(!empty($topics)): ?>
                        
                        <label for="chooseExist"><input type="radio" name="chooseTopic" value="exist" id="chooseExist" checked >
                            <select name="selectTopic" id="selectTopic">

                                <?php foreach($topics as $topic){
                                    echo '<option>' . $topic . '</option>';
                                }
                                ?>

                            </select>
                        </label>
                        
                    <?php endif; ?>

                    
                    <label for="chooseCreate">
                        <input type="radio" name="chooseTopic" value="newOne" id="chooseCreate">
                        <input autocomplete="off" class="form-input form-input__topic" type="text" name="topicName" id="topicName" placeholder="Name of topic">
                    </label>
                </div>

                <div class="form-post__picture-box">
                    <label for="userPicture">You can add some picture</label>
                    <input type="file" name="userPicture">
                </div>

                <div class="form-post__box">
                    <label for="postMsg">Your post</label>
                    <textarea class="form-post__text" name="postMsg" id="postMsg" placeholder="Message here" ></textarea>
                </div>

                <button type="submit" class="btn btn-grad btn__public">Public</button>

            </form>

        </div>
        


    </div>

<?php require_once __DIR__ . '/views/footer.php'; ?>

<?php //dump($posts);
    //dump($topics);
?>