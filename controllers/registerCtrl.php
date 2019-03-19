<?php
    // On charge la page autoload.
    require_once '../autoload.php';
    // On charge tous nos modèles. 
    spl_autoload_register('uploadClass'); 
    // Déclaration de plusieurs expressions régulières(regex).
    $controlName = "/^[A-Za-zéç',. ÉÈ]{1,16}$/";
    $controlPassword = "/^(?=.*?[A-ZÉÈ])(?=.*?[a-zéè])(?=.*?[0-9])(?=.*?[#?!@$%^&.*-]).{8,}$/";
    // Déclaration d'une variable à un tableau.
    $formErrors = [];
    $message = '';
   
    // Si la  valeur du $_POST['validation'] est présente.
    if(isset($_POST['validation'])){
        $user = new user();
        // Si la valeur du $_POST['civility'] n'est pas vide.
        if(!empty($_POST['civility'])){
            $user->user_civility = htmlspecialchars($_POST['civility']);
        }else{
        // Sinon on assigne un message d'erreur à notre tableau.
            $formErrors['civility'] = 'Veuillez choisir votre civilité';
        }
        // Si la valeur du $_POST['lastname'] n'est pas vide.
        if(!empty($_POST['lastname']) && preg_match($controlName, $_POST['lastname'])){
            // Si la valeur du $_POST['lastname'] passe notre expression régulière.
            // On assigne la valeur du $_POST['lastname'] à à l'attribut de la classe user.
            $user->user_lastname = htmlspecialchars($_POST['lastname']);
        }else{
        // Sinon on assigne un message d'erreur à notre tableau.
            $formErrors['lastname'] = 'Veuillez insérer correctement votre nom';
        }
        // Si la valeur du $_POST['firstname'] n'est pas vide.
        if(!empty($_POST['firstname']) && preg_match($controlName, $_POST['firstname'])){
            // On assigne la valeur du $_POST['firstname'] à à l'attribut de la classe user.
            $user->user_firstname = htmlspecialchars($_POST['firstname']);
        }else{
        // Sinon on assigne un message d'erreur à notre tableau.
            $formErrors['firstname'] = 'Veuillez insérer correctement votre prénom';
        }
        // Si la valeur du $_POST['experience'] n'est pas vide.
        if(!empty($_POST['experience'])){
        // On assigne la valeur du $_POST['experience'] à à l'attribut de la classe user.
            $user->user_experience = htmlspecialchars($_POST['experience']); 
        }else{
        // Sinon on assigne un message d'erreur à notre tableau.
            $formErrors['experience'] = 'Veuillez choisir votre expérience';
        }
        // Si la valeur du $_POST['userName'] n'est pas vide
        if(!empty($_POST['userName']) && preg_match($controlName, $_POST['userName'])){
            // Si la valeur du $_POST['userName'] passe notre expression régulière.
            // On assigne la valeur du $_POST['userName'] à à l'attribut de la classe user.
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
        if(!empty($_POST['mail'])){
            // On assigne la valeur du $_POST['mail'] à à l'attribut de la classe user.
            $user->user_mail = htmlspecialchars($_POST['mail']);
            if(filter_var($user->user_mail, FILTER_VALIDATE_EMAIL)){
                $checkMail = $user->user_checkMail();
                if($checkMail->nbMail > 0){
                    $formErrors['mail'] = 'L\'adresse mail existe déja';
                }
            }
        }else{
            $formErrors['mail'] = 'L\' email renseigné est invalide';
        }
        // Si la valeur du $_POST['password'] n'est pas vide et $_POST['confirmPassword'].
        if(!empty($_POST['password']) && !empty($_POST['confirmPassword'])){
            // Si la valeur du $_POST['password'] passe notre expression régulière.
            if($_POST['password'] == $_POST['confirmPassword']){
                if(preg_match($controlPassword, $_POST['password'])){
                    // On assigne la valeur du $_POST['password'] hashée à l'attribut de la classe user.
                    $user->user_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                }else{
                    $formErrors['password'] = 'La saisie de votre mot de passe est invalide';
                }
            }else{
                $formErrors['password'] = 'Les mots de passe ne correspondent pas';  
            }
        }else{
        // Sinon on assigne un message d'erreur dans le tableau $formErrors[].
            $formErrors['password'] = 'Un des champs est vide';
        }
    }
    // Si le $_POST['validation'] est présent et le nombre d'entrées du tableau $formErrors[] est égal à 0.
    if(isset($_POST['validation']) && count($formErrors) == 0){
        if($user->user_add()){
            header('location: connexion');
        }else{
            $message = 'Une erreur est survenue lors de la saisie des informations, veuillez rééssayer';
        }
        
    }
    