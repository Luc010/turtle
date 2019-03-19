<?php
    // On charge la page autoload.
    require_once '../autoload.php';
    // On charge tous nos modèles. 
    spl_autoload_register('uploadClass'); 
    $controlName = "/^[A-Za-zéç',. ÉÈ]{1,16}$/i"; 
    // Déclaration d'une variable à un tableau.
    $formErrors = [];
    $user = new user();

//    CONDITIONS PERMETTANT DE METTRE À JOUR LES INFORMATIONS DE L'UTILISATEUR.
    if(isset($_POST['validation'])){
        if(!empty($_POST['civility'])){
            $user->user_civility = htmlspecialchars($_POST['civility']);
        }else{
        // Sinon on assigne un message d'erreur à notre tableau.
            $formErrors['civility'] = 'Veuillez choisir votre civilité';
        }
        // Si la valeur du $_POST['lastname'] n'est pas vide.
        if(!empty($_POST['lastname']) && preg_match($controlName, $_POST['lastname'])){
            // Si la valeur du $_POST['lastname'] passe notre expression régulière.
            // On assigne la valeur du $_POST['lastname'] à une variable.
            $user->user_lastname = htmlspecialchars($_POST['lastname']);
        }else{
        // Sinon on assigne un message d'erreur à notre tableau.
            $formErrors['lastname'] = 'Veuillez insérer correctement votre nom';
        }
        // Si la valeur du $_POST['firstname'] n'est pas vide.
        if(!empty($_POST['firstname']) && preg_match($controlName, $_POST['firstname'])){
            // On assigne la valeur du $_POST['firstname'] à une variable.
            $user->user_firstname = htmlspecialchars($_POST['firstname']);
        }else{
        // Sinon on assigne un message d'erreur à notre tableau.
            $formErrors['firstname'] = 'Veuillez insérer correctement votre prénom';
        }
        // Si la valeur du $_POST['experience'] n'est pas vide.
        if(!empty($_POST['experience'])){
        // On assigne la valeur du $_POST['experience'] à une variable.
            $user->user_experience = htmlspecialchars($_POST['experience']); 
        }else{
        // Sinon on assigne un message d'erreur à notre tableau.
            $formErrors['experience'] = 'Veuillez choisir votre expérience';
        }
    }
//    SI IL N'Y A PAS D'ERREUR ON FAIT APPEL À LA MÉTHODE PERMETTANT DE METTRE À JOUR LES INFORMATIONS DU PROFIL UTILISATEUR.
    if(isset($_POST['validation']) && count($formErrors) == 0){
    // J'instancie la classe user.
        $user->user_id = $_SESSION['id'];
        $user->user_editInfo();
        header('location: ');
    }