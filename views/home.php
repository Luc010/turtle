<?php 
    session_start();
    $title = 'Accueil';
    include_once 'include/header.php';
?>
<!--
        ON DÉCLARE UNE VARIABLE CONTENANT LE TITRE DE LA PAGE D'ACCUEIL.
        ON INCLUT TROIS FICHIERS PHP DONT L'EN-TÊTE, LA BARRE DE NAVIGATION ET LE PIED DE PAGE.
-->
<body>
    <?php include_once 'include/navbar.php' ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 p-0">
                <img class="img-responsive" src="../assets/img/untitled.jpg" width="100%"/>  
            </div>
        </div>   
    </div>
    <?php include_once 'include/footer.php' ?>
</body>
</html>