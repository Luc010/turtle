<?php 
    session_start();
    require_once '../controllers/user_configCtrl.php';
    $title = 'Mes paramètres';
    include_once 'include/header.php';
?>
<!--
        ON DÉMARRE LA SESSION DE L'UTILISATEUR/TRICE,
        ON DÉCLARE UNE VARIABLE CONTENANT LE TITRE DE LA PAGE DES PARAMÈTRES DU PROFIL UTILISATEUR.
        ON INCLUT TROIS FICHIERS PHP DONT L'EN-TÊTE, LA BARRE DE NAVIGATION ET LE PIED DE PAGE.
-->
<body>
    <div class="container-fluid">
        <?php include_once 'include/navbar.php' ?>
        <div class="row">
            <div id="border"class="col-md-12">
                <h1 class="text-white font-weight-bold">Profil</h1>
                <?php include_once 'include/menu.php' ?>
            </div>
        </div>
        <div class="row p-3">
            <div class="card col-md-12 p-3">
                <p class="font-weight-bold">Nom d'utilisateur</p>
                <form class="form-group" method="POST" action="">
                    <div class="form-group">
                        <label for="userName">Votre nom d'utilisateur actuel</label>
                        <input class="ml-3" type="text" size="20" id="userName" value="<?= $userInfo->user_name ?>">
                    </div>
                    <div class="form-group">
                        <label for="userName">Nouvel utilisateur</label>
                        <input class="ml-3" type="text" size="20" id="userName" name="userName" value="">
                        <p class="text-danger"><small><?= (isset($formErrors['userName'])) ? $formErrors['userName'] :'' ?></small></p>
                    </div>
                    <input class="btn btn-primary color" type="submit" name="checkUserName" value="Envoyer"/>
                </form>
            </div>
        </div>
        <div class="row p-3">
            <div class="card col-md-12 p-3">
                <p class="font-weight-bold">Adresse mail</p>
                <form class="form-group" method="POST" action="">
                    <div class="form-group">
                        <label for="mail">Votre adresse mail actuel</label>
                        <input id="mail" class="ml-3" type="text" size="20" value="<?= $userInfo->user_mail ?>">
                    </div>
                    <div class="form-group">
                        <label for="mail">Nouvelle adresse mail</label>
                        <input class="ml-3" type="text" size="20" name="mail" id="mail" value="">
                        <p class="text-danger"><small><?= (isset($formErrors['mail'])) ? $formErrors['mail'] :'' ?></small></p>
                    </div>
                    <input class="btn btn-primary color" type="submit" name="checkMail" value="Envoyer"/>
                </form>
            </div>
        </div>
        <div class="row p-3">
            <div class="card col-md-12 p-3">
                <p class="font-weight-bold">Mot de passe</p>
                <form class="form-group" method="POST" action="">
                    
                    <div class="form-group">
                        <label for="password">Ancien mot de passe</label>
                        <input id="password" class="ml-3" type="password" size="20" name="oldPassword" value="" />
                        <p class="text-danger"><small><?= (isset($formErrors['oldPassword'])) ? $formErrors['oldPassword'] :'' ?></small></p>
                    </div>
                    <div class="form-group">
                        <label for="password">Nouveau mot de passe</label>
                        <input class="ml-3" type="password" size="20" name="password" id="password" value="">
                    </div>
                    <div class="form-group">
                        <label for="password">Confirmer le mot de passe</label>
                        <input class="ml-3" type="password" size="20" name="confirmPassword" id="password" value="">
                         <p><small class="text-danger"><?= (isset($formErrors['password'])) ? $formErrors['password'] :'' ?></small><p>
                    </div>
                    <input class="btn btn-primary color" type="submit" name="editPassword" value="Envoyer"/>
                </form>
            </div>
        </div>
        <div class="row p-3">
            <div class="col-md-12">
                <p class="text-danger font-weight-bold">Supprimer votre compte</p>
                <a data-toggle="modal" data-target="#exampleModal" type="submit" title="Delete"><u>Je souhaite supprimer mon compte</u></a>
            </div>
        </div>
           <!-- Modal -->
        <form method="POST" action="">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-dark p-2">
                    <h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel">Supprimer son compte</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      Êtes-vous sûr de vouloir supprimer votre compte définitivement?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Retour</button>
                    <button type="submit" class="btn btn-dark" name="delete" value="delete">Supprimer</button>
                  </div>
                </div>
              </div>
            </div>
        </form>
    <?php include_once 'include/footer.php'  ?>
</body>
</html> 