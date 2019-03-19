<?php require '../controllers/menuCtrl.php' ?>
<nav class="navbar navbar-expand-lg band justify-content-start p-0 m-4">
      <div class="navbar-nav">
        <a class="text-white nav-item nav-link" href="../profil/<?= $userInfo->user_name ?>">Profil<span class="sr-only">(current)</span></a>
        <a class="text-white nav-item nav-link" href="../paramètres/<?= $userInfo->user_name ?>">Paramètres</a>
        <a class="text-white nav-item nav-link" href="../premium/<?= $userInfo->user_name ?>">Premium</a>
      </div>
</nav>