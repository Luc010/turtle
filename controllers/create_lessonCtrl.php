<?php
    // On charge la page autoload.
    require_once '../autoload.php';
    // On charge tous nos modèles. 
    spl_autoload_register('uploadClass');
  
    if(isset($_SESSION['id'])){
        $user = new user();
        $user->user_id = $_SESSION['id'];
        $userInfo = $user->user_info();
    }
    if(isset($_POST['createLesson'])){
        $lesson = new lesson();
        if(!empty($_POST['user_title'])){
        $lesson->id_turtle_users = $_SESSION['user_id'];
        }
        $lesson->title = $_POST['user_title'];
        $lesson->text = $_POST['user_text'];
        if($lesson->create_lesson()){
            header('location: afficher_cours');
        }else{
            echo 'Veuillez rééssayer';
        }
    }