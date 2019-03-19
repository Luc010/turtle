<?php
    // On charge la page autoload.
    require_once '../autoload.php';
    // On charge tous nos modèles. 
    spl_autoload_register('uploadClass'); 
    $controlName = "/^[A-Za-zéç',. ÉÈ]{1,16}$/i"; 
    // Déclaration d'une variable à un tableau.
    $message = '';
    $formErrors = [];
    $user = new user();
    
    if(isset($_POST['editPassword'])){
    // Si la valeur du $_POST['userName'] n'est pas vide
        if(!empty($_POST['oldPassword'] && $_POST['password'] & $_POST['confirmPassword'])){
            $user->user_password = htmlspecialchars($_POST['oldPassword']);
            $checkPassword = $user->user_checkPassword();
            // Si le mot de passe entrée correspond à l'ancien mot de passe
            if(password_verify($user->user_password, $_SESSION['password'])){
                $message = 'ok';
            }else{
            // Sinon on assigne un message d'erreur dans le tableau $formErrors[].
            $formErrors['oldPassword'] = 'Le mot de passe ne correspond pas au précédent';
            }            
            if($_POST['password'] == $_POST['confirmPassword']){
                $user->user_password = password_hash($_POST['password'], PASSWORD_BCRYPT);;
            }else{
            $formErrors['password'] = 'Les mots de passe ne correspondent pas';   
            }
        }else{
        // Sinon on assigne un message d'erreur dans le tableau $formErrors[].
            $formErrors['password'] = 'Les champs sont vides';
        }
        if(count($formErrors) == 0){
            $user->user_id = $_SESSION['id'];
            $user->user_editPassword();
        }
    }
    if(isset($_POST['checkUserName'])){
    // Si la valeur du $_POST['userName'] n'est pas vide
        if(!empty($_POST['userName']) && preg_match($controlName, $_POST['userName'])){
            // Si la valeur du $_POST['userName'] passe notre expression régulière.
            // On assigne la valeur du $_POST['userName'] à une variable.
            $user->user_name = htmlspecialchars($_POST['userName']);
            $checkUsername = $user->user_checkUserName();
            // Si le nom d'utilisateur existe déja
            if($checkUsername->nbPseudo > 0){
                $formErrors['userName'] = 'Ce nom d\'utilisateur existe déja';
            }            
        }else{
        // Sinon on assigne un message d'erreur dans le tableau $formErrors[].
            $formErrors['userName'] = 'Veuillez insérer correctement votre nom d\'utilisateur';
        }
        if(count($formErrors) == 0){
            $user->user_id = $_SESSION['id'];
            $user->user_editUserName();
            header('location: ');
        }
    }
    if(isset($_POST['checkMail'])){
    // Si la valeur du $_POST['mail] n'est pas vide
        $user->user_mail = htmlspecialchars($_POST['mail']);
        if(!empty($_POST['mail']) && filter_var($user->user_mail, FILTER_VALIDATE_EMAIL)){
            // Si la valeur du $_POST['mail'] passe notre expression régulière.
            // On assigne la valeur du $_POST['userName'] à une variable.
            $checkMail = $user->user_checkMail();
            if($checkMail->nbMail > 0){
                $formErrors['mail'] = 'L\'adresse mail existe déja';
            } 
        }else{
        // Sinon on assigne un message d'erreur dans le tableau $formErrors[].
            $formErrors['mail'] = 'Veuillez insérer correctement votre adresse mail';
        }
        if(count($formErrors) == 0){
            $user->user_id = $_SESSION['id'];
            $user->user_editMail();
            header('location: ');
        }
    }
    if(isset($_POST['delete'])){
        $user->user_id = $_SESSION['id'];
        $user->user_delete();
        session_destroy();
        header('location: ../accueil');
    }