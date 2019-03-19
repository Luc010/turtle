<?php
    session_start();
    $title = 'Connexion';
    require_once '../controllers/connexionCtrl.php';
    include_once 'include/header.php';
?>
<!--
        - PAGE DE CONNEXION 
        - L'UTILISATEUR/TRICE S'IDENTIFIE SUR L'ESPACE DE CONNEXION PAR UN FORMULAIRE DE CONNEXION CETTE FOIS.
        - ON INCLUT LE CONTROLLER DE CETTE PAGE ET TROIS FICHIERS PHP DONT L'EN-TÊTE, LA BARRE DE NAVIGATION ET LE PIED DE PAGE.
        - LE CONTROLLER PERMETTRA D'INSTANCIER UN MESSAGE D'ERREUR SI LA CONNEXION ÉCHOUE.
-->
<body class="bg">
    <?php include_once 'include/navbar.php' ?>
    <div class="container-fluid">
        <div class="row justify-content-center">    
            <form class="card form-group p-5 center" action="" method="POST">
                <h1 class="text-center p-2">Connexion</h1>
                <label for="pseudo">Identifiant de connexion</label>
                <input type="text" id="pseudo" class="form-control" name="pseudo" value="" placeholder="example@exemple.fr"/>
                <p class="text-danger"><small><?= (isset($formErrors['pseudo'])) ? $formErrors['pseudo'] : '' ?></small></p>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" class="form-control" name="password" />
                <p class="text-danger"><small><?= (isset($formErrors['password'])) ? $formErrors['password'] : '' ?></small></p>
                <input type="submit" name="submit" class="btn-block btn-lg btn-primary mt-2" value="Connexion" id="submit" />
                <?php 
                    if($message != ''){
                ?>
                <p class="text-wrap text-center alert alert-danger"><?= $message ?></p>
                <?php 
                    }
                ?>
                <a class="btn-block btn-lg text-center btn-success text-white p-3 mt-2" href="inscription">Pas encore inscrit?</a>
            </form>
        </div>
    </div>
<?php include_once 'include/footer.php' ?>
</body>
</html>