<?php
    $formErrors = [];
    $message = '';
    // On charge la page function php.
    require_once '../autoload.php';
    // On charge tous nos modèles. 
    spl_autoload_register('uploadClass'); 
    $user = new user();
    // Si la  valeur du $_POST['submit'] est présente.
    if(isset($_POST['submit'])){
    // Si le $_POST['userName'] n'est pas vide.
        if(!empty($_POST['pseudo'])){
        // On assigne la valeur du $_POST['pseudo'] dans la variable $userName.
            $user->user_pseudo = htmlspecialchars($_POST['pseudo']);
        }else{
        // On assigne un message d'erreur dans le tableau $formErrors[].
            $formErrors['pseudo'] = 'Erreur dans la saisie de l\'identifiant';
        }
        // Si $_POST['password'] n'est pas vide
        if(!empty($_POST['password'])){
        // On assigne la valeur de $_POST['password'] dans la variable $password.
            $user_password = htmlspecialchars($_POST['password']);
        }else{
        // On assigne un message d'erreur dans le tableau $formErrors[].
            $formErrors['password'] = 'Erreur dans la saisie du mot de passe';
        }
        // Si le nombre d'entrées dans le tableau $formErrors est égal a 0.
        if(count($formErrors) == 0){
            // On assigne la valeur de $pseudo à l'attribut de la classe user.
            if($user->user_connect()){
                if(password_verify($user_password, $user->user_password)){
                    // La connexion s'est bien déroulée.
                    // On hydrate la session avec les attributs de l'objet.
                    $message = 'connect';
                    $_SESSION['id'] = $user->user_id;
                    $_SESSION['role'] = $user->user_role;
                    $_SESSION['password'] = $user->user_password;
                    $_SESSION['ok'] = true;
                    header('location: accueil');
                }else{
                // Sinon la connexion échoue
                    $message = 'Erreur lors de la saisie de votre mot de passe et/ou de votre identifiant';
                }
            }else{
                $message = 'La connexion a echoué, veuillez rééssayer';
            }
        }
    }
