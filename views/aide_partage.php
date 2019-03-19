<?php 
    session_start();
    $title = 'Aide/Partage';
    include_once 'include/header.php';
    include_once 'include/navbar.php';
    require_once '../controllers/aide_partageCtrl.php'
?>
<body>
    <div class="container-fluid">
        <form method='POST' action="">
            <div class="row">
                <div id="border">
                    <h1 class="text-white font-weight-bold">Liste des forums</h1>
                </div>
            </div>
            <div class="row">
                <?php
                    foreach($cat_info as $value){
                ?>
                        <a class="col-md-3 card" href="listeDesSujets?cat_id=<?= $value->cat_id ?>">
                            <div class="card-body">
                                <h3 class="forum_title font-weight-bold"> <?= $value->cat_name ?></h3>
                                <p><?= $value->cat_description ?></p>
                            </div>
                        </a>
                <?php        
                    }
                ?>
            </div>
        </form>
    </div>
    <?php include_once 'include/footer.php' ?>
</body>
</html>