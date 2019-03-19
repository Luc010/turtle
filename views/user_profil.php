<?php
    session_start();
    require_once '../controllers/user_profilCtrl.php';
    $title = 'Mon profil';
    include_once 'include/header.php';
?>
<!--
        ON DÉMARRE LA SESSION DE L'UTILISATEUR/TRICE,
        ON DÉCLARE UNE VARIABLE CONTENANT LE TITRE DE LA PAGE DU PROFIL UTILISATEUR.
        ON INCLUT TROIS FICHIERS PHP DONT L'EN-TÊTE, LA BARRE DE NAVIGATION ET LE PIED DE PAGE.
-->
<body class="bg">
    <div class="container-fluid">
        <?php include_once 'include/navbar.php' ?>
        <div class="row">
            <div id="border" class="col-md-12 p-0">
                <h1 class="text-white font-weight-bold m-4">Profil</h1>
                <?php include_once 'include/menu.php' ?>
            </div>
        </div>
        <?php
            if(isset($_POST['edit'])){
        ?>
                <form class="card mx-auto m-5 w-75" method="POST" action="">
                    <div class="form-group col-md-12 p-5">
                        <label for="civility">Civilité</label>
                        <!--On cherche à afficher avec cette ternaire un message d'erreurs  sinon on n'affiche rien.-->
                        <p class="text-danger"><small><?= (isset($formErrors['civility'])) ? $formErrors['civility'] : '' ?></small></p>
                        <select name="civility" class="form-control" id="civility">
                          <option value="<?= $userInfo->user_civility ? $userInfo->user_civility : 'disabled selected value' ?>"><?= $userInfo->user_civility ?></option>
                          <option value="M.">M.</option>
                          <option value="Mme">Mme</option>
                          <option value="Autre">Autre</option>
                        </select>
                        <label for="firstname">Prénom</label>
                        <p class="text-danger"><small><?= (isset($formErrors['firstname'])) ? $formErrors['firstname'] : '' ?></small></p>
                        <input type="text" name="firstname" value="<?= $userInfo->user_firstname ?>" id="firstname" class="form-control">
                        <label for="lastname">Nom</label>
                        <p class="text-danger"><small><?= (isset($formErrors['lastname'])) ? $formErrors['lastname'] : '' ?></small></p>
                        <input type="text" name="lastname" value="<?= $userInfo->user_lastname ?>" id="lastname" class="form-control">
                        <label for="controlSelect">Expérience</label>
                        <p class="text-danger"><small><?= (isset($formErrors['experience'])) ? $formErrors['experience'] : '' ?></small></p>
                        <select name="experience" class="form-control" id="controlSelect">
                          <option value="<?= $userInfo->user_experience ? $userInfo->user_experience : 'disabled selected value' ?>"><?= $userInfo->user_experience ?></option>
                          <option value="Débutant">Débutant</option>
                          <option value="Intermédiaire">Intermédiaire</option>
                          <option value="Expert">Expert</option>
                        </select>
                        <input type="submit" value="Enregistrer" name="validation" id="submitAjout" class="btn btn-secondary form-control mt-5" />
                    </div>
                </form>
            <?php
                }elseif(count($formErrors) != 0){
            ?>
                <form class="card mx-auto m-5 w-75" method="POST" action="">
                    <div class="form-group col-md-12 p-5">
                        <label for="civility">Civilité</label>
                        <!--On cherche à afficher avec cette ternaire un message d'erreurs  sinon on n'affiche rien.-->
                        <p class="text-danger"><small><?= (isset($formErrors['civility'])) ? $formErrors['civility'] : '' ?></small></p>
                        <select name="civility" class="form-control" id="civility">
                          <option value="<?= $userInfo->user_civility ? $userInfo->user_civility : 'disabled selected value' ?>"><?= $userInfo->user_civility ?></option>
                          <option value="M.">M.</option>
                          <option value="Mme">Mme</option>
                          <option value="Autre">Autre</option>
                        </select>
                        <label for="firstname">Prénom</label>
                        <p class="text-danger"><small><?= (isset($formErrors['firstname'])) ? $formErrors['firstname'] : '' ?></small></p>
                        <input type="text" name="firstname" value="<?= $userInfo->user_firstname ?>" id="firstname" class="form-control">
                        <label for="lastname">Nom</label>
                        <p class="text-danger"><small><?= (isset($formErrors['lastname'])) ? $formErrors['lastname'] : '' ?></small></p>
                        <input type="text" name="lastname" value="<?= $userInfo->user_lastname ?>" id="lastname" class="form-control">
                        <label for="controlSelect">Expérience</label>
                        <p class="text-danger"><small><?= (isset($formErrors['experience'])) ? $formErrors['experience'] : '' ?></small></p>
                        <select name="experience" class="form-control" id="controlSelect">
                          <option value="<?= $userInfo->user_experience ? $userInfo->user_experience : 'disabled selected value' ?>"><?= $userInfo->user_experience ?></option>
                          <option value="Débutant">Débutant</option>
                          <option value="Intermédiaire">Intermédiaire</option>
                          <option value="Expert">Expert</option>
                        </select>
                    </div>
                    <input type="submit" value="Enregistrer" name="validation" id="submitAjout" class="btn-secondary mx-auto mb-3 btn-lg" />
                </form>
            <?php
                }else{
            ?>
                <div class="row m-5">
                    <div class="col-md-12">
                        <form method="POST" action="">
                            <button type="submit" name="edit" class="btn btn-primary float-right color">MODIFIER</button>
                        </form>
                    </div>
                </div>
                <div class="row m-5">
                    <div class="col-md-12">
                        <div class="card p-5 mb-3 d-flex flex-row">
                            <img class="img-responsive" src="../assets/img/user.png" alt="" height="100px" width="100px" />
                            <h1 class="ml-3 my-auto"><?= $userInfo->user_name ?></h1>
                        </div>
                        <div class="card p-5">
                            <h2>A propos</h2>
                            <p>Civilité : <?= $userInfo->user_civility ?></p>
                            <p>Nom : <?= $userInfo->user_firstname ?></p>
                            <p>Prénom : <?= $userInfo->user_lastname ?></p>
                            <p>Expérience : <?= $userInfo->user_experience ?></p>
                        </div>
                        <div class="card p-5 mt-3">
                            <h2>Informations du compte</h2>
                            <p>Type de compte: <?= $userInfo->role_status ?></p>
                            <p>Crée le : <?= $userInfo->user_date ?></p>
                        </div>
                    </div>
                </div>
            <?php 
                }
            ?>
    </div> 
<?php include_once 'include/footer.php' ?>
</body>
</html>
