<!--On inclut le contenu d'un controller qui permettra d'afficher à l'utilisateur/trice une fois connecté son nom d'utilisateur.
Le require permet de provoquer une erreur bloquante si le controller de la barre de naviguation est indisponible.-->
<?php 
    require_once '../controllers/navbarCtrl.php';
?>
<nav class="navbar navbar-expand-lg navbar-light m-1">
    <a class="navbar-brand ml-2" href="../accueil"><img src="../assets/img/logo.png" alt="" height="60px" width="190px"/></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end m2" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link mr-5" href="../ressources">Ressources</a>
      </li>
      <li class="nav-item">
        <a class="nav-link mr-5" href="../aide-partage">Aide/Partage</a>
      </li>
<!--      VERIFICATION SI L'UTILISATEUR EST CONNECTÉ, AFFICHE UN DROPDOWN CONTENANT PLUSIEURS LIENS -->
      <?php
        if(isset($_SESSION['ok'])){
      ?>
            <li class="nav-item">
                <div class="dropdown show">
                    <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="mr-2" src="../assets/img/user.png" alt="" height="27px" width="27px"/><?= $userInfo->user_name ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="../profil/<?= $userInfo->user_name ?>">Mon compte</a>
                      <a class="dropdown-item" href="../créer_catégorie/<?= $userInfo->user_name ?>">Créer une catégorie</a>
                      <a class="dropdown-item" href="../créer_sujet/<?= $userInfo->user_name ?>">Créer un sujet de discussion</a>
                      <?php
                        if($_SESSION['role'] == 3){
                      ?>
                            <a class="dropdown-item" href="../liste_utilisateur/<?= $userInfo->user_name ?>">Liste utilisateur</a>
                      <?php 
                        }
                      ?>
                      <a class="dropdown-item" href="<?= $_SERVER['PHP_SELF'] ?>?action=disconnect">Déconnexion</a>
                    </div>
                </div>
            </li>
      <?php    
        }else{   
      ?>  
<!--            LIENS VERS LES PAGES INCRIPTION ET CONNEXION. -->
            <li class="nav-item">
              <a href="inscription" class="button btn btn-secondary text-white font-weight-bold p-3">S'inscrire</a>
            </li>
            <li class="nav-item">
              <a href="connexion" class="button btn btn-secondary text-white font-weight-bold p-3">Se connecter</a>
            </li>
      <?php
        }
      ?>
    </ul>
  </div>
</nav>

