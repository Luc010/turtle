<?php
    // On charge la page autoload.
    require_once '../autoload.php';
    // On charge tous nos modèles. 
    spl_autoload_register('uploadClass'); 
    $user = new user();
    $user_listInfo = $user->user_listInfo();
    
    if(isset($_POST['delete'])){
        $user->user_id = $_POST['delete'];
        $user->user_delete();
        header("location: ");
    }
