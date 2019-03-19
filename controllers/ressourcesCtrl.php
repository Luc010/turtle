<?php
    // On charge la page autoload.
    require_once '../autoload.php';
    // On charge tous nos modèles. 
    spl_autoload_register('uploadClass'); 
    $user = new user();
    
    if(isset($_POST['submit'])){
        require_once 'connexionCtrl.php';
    }