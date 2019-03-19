<?php
    if(isset($_SESSION['id'])){
        $user = new user();
        $user->user_id = $_SESSION['id'];
        $userInfo = $user->user_info();
    }else{
        header('location: ../connexion');
    }
