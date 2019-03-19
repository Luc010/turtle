<?php 
    session_start();
    require_once '../controllers/user_premiumCtrl.php';
    $title = 'Accès premium';
    include_once 'include/header.php';
?>
<!--
        ON DÉMARRE LA SESSION DE L'UTILISATEUR/TRICE,
        ON DÉCLARE UNE VARIABLE CONTENANT LE TITRE DE LA PAGE DES PARAMÈTRES DU PROFIL UTILISATEUR.
        ON INCLUT TROIS FICHIERS PHP DONT L'EN-TÊTE, LA BARRE DE NAVIGATION ET LE PIED DE PAGE.
-->
<body class="bg">
    <div class="container-fluid">
        <?php include_once 'include/navbar.php' ?>
        <div class="row">
            <div id="border"class="col-md-12">
                <h1 class="text-white font-weight-bold">Profil</h1>
                <?php include_once 'include/menu.php' ?>
            </div>
        </div>
        <form class="card mx-auto p-5 w-75" method="POST" action="">
            <label class="text-center font-weight-bold p-5">Devenir premium</label>
            <button type="submit" class="btn btn-primary color" value="2" name="updateRole">Passer premium</button>
        </form>
    </div>
    <?php include_once 'include/footer.php'  ?>
</body>
</html>

