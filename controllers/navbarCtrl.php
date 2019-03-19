<?php
    // On charge la page autoload.
    require_once '../autoload.php';
    // On charge tous nos modèles. 
    spl_autoload_register('uploadClass');
    
    if(isset($_GET['action'])){
    // Si on veut se déconnecter.
        if($_GET['action'] == 'disconnect'){
            //destruction de la session
            session_destroy();
    // Redirection vers la page d'accueil.
            header('location: ../accueil');
        }
    }
    if(isset($_SESSION['id'])){
        $user = new user();
        $user->user_id = $_SESSION['id'];
        $userInfo = $user->user_info();
    }