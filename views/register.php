<?php 
    $title = 'Formulaire d\'inscription';
    require_once '../controllers/registerCtrl.php';
    include_once 'include/header.php';
    include_once 'include/navbar.php'; 
?>
<!-- 
        ON INTÈGRE À UNE VARIABLE LE TITRE DE LA PAGE CONTENANT UN FORMULAIRE D'INSCRIPTION.
        ON INCLUT TROIS FICHIERS PHP DONT L'EN-TÊTE, LA BARRE DE NAVIGATION ET LE PIED DE PAGE.
-->
<body>
    <div id="border" class="text-left text-white col-md-12 mb-5">
        <h1 class="text-white font-weight-bold">
            Formulaire d´inscription 
        </h1>
    </div>
    <div class="container-fluid">
        <form class="row" method="POST" action="">
            <div class="form-group col-md-6">
                <label for="civility">Civilité</label>
                <!--On cherche à afficher avec cette ternaire un message d'erreurs  sinon on n'affiche rien.-->
                <p class="text-danger"><small><?= isset($formErrors['civility']) ? $formErrors['civility'] : '' ?></small></p>
                <select name="civility" class="form-control" id="civility">
                  <option value="<?= isset($_POST['civility']) ? $_POST['civility'] : 'disabled selected value' ?>"></option>
                  <option value="M.">M.</option>
                  <option value="Mme">Mme</option>
                  <option value="Autre">Autre</option>
                </select>
                <label for="lastname">Nom</label>
                <p class="text-danger"><small><?= (isset($formErrors['lastname'])) ? $formErrors['lastname'] : '' ?></small></p>
                <input type="text" name="lastname" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" class="form-control">
                <label for="firstname">Prénom</label>
                <p class="text-danger"><small><?= (isset($formErrors['firstname'])) ? $formErrors['firstname'] : '' ?></small></p>
                <input type="text" name="firstname" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" id="firstname" class="form-control">
                <label for="controlSelect">Expérience</label>
                <p class="text-danger"><small><?= (isset($formErrors['experience'])) ? $formErrors['experience'] : '' ?></small></p>
                <select name="experience" class="form-control d-inline-flex" id="controlSelect">
                  <option value="<?= isset($_POST['experience']) ? $_POST['experience'] : 'disabled selected value' ?>"></option>
                  <option value="Débutant">Débutant</option>
                  <option value="Intermédiaire">Intermédiaire</option>
                  <option value="Expert">Expert</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="userName">Pseudo de connexion</label>
                <p class="text-danger"><small><?= (isset($formErrors['userName'])) ? $formErrors['userName'] : '' ?></small></p>
                <input type="text" id="userName" name="userName" value="<?= isset($_POST['userName']) ? $_POST['userName'] : '' ?>" class="form-control" />
                <label for="mail">E-mail de connexion</label>
                <p class="text-danger"><small><?= (isset($formErrors['mail'])) ? $formErrors['mail'] :'' ?></small></p>
                <input type="email" name="mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>"id="mail" class="form-control" placeholder="ex@exemple.fr"/>
                <label for="password">Mot de passe</label>
                <p class="text-danger"><small><?= (isset($formErrors['password'])) ? $formErrors['password'] : '' ?></small></p>
                <input type="password" id="password" name="password" class="form-control">
                <label for="confirmPassword">Confirmation du mot de passe</label>
                <input type="password" name="confirmPassword" id="confirmPassword" class=" d-inline-flex form-control">
                <div class="text">
                    <small class="badge badge-light text-wrap">8 caractères minimum :</small>
                    <small class="text-muted">1 majuscule,</small>
                    <small class="text-muted">1 minuscule,</small>
                    <small class="text-muted">1 caractère spécial,</small>
                    <small class="text-muted">1 chiffre minimum.</small>
                </div>
            </div>
            <input type="submit" value="Envoyer" name="validation" id="submitAjout" class="btn-secondary mx-auto btn-lg" />
        </form>
        <?php
            if($message != 0){
        ?>
                <p class="alert alert-danger"><?= $message ?></p>
        <?php
            }
        ?>
    </div>
<?php include_once 'include/footer.php' ?>
</body>
</html>


