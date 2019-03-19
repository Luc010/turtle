<?php 
    session_start();
    $title = 'Liste des sujets';
    include_once 'include/header.php';
    include_once 'include/navbar.php';
    require_once '../controllers/topics_listCtrl.php';
?>
<body>
    <div class="container-fluid">
        </div>
            <div id="border">
                <?php
                    foreach($cat_info as $value){
                ?>
                        <h1 class="text-white font-weight-bold"><?= $value->cat_name ?></h1>
                <?php        
                    }
                ?>
            </div>
        </div>
        <?php
            if(empty($topics_info)){
        ?>
            <div class="row">
                <div class="card col-md-12">
                    <p>Oups, pas de sujets pour l´instant...</p>
                    <a type="button" class="btn btn-secondary" href="../créer_sujet">Créer un sujet</a>
                </div>
            </div>
        <?php
            }elseif(empty($_SESSION['id'])){
                foreach($topics_info as $value){
    ?> 
                    <a class="card col-md-12" href="sujet?topics_id=<?= $value->topics_id ?>">
                        <div class="card-body">
                            <h3 class="font-weight-bold"> <?= $value->topics_subject ?></h3>
                            <p class="font-italic text-secondary">Par <?=  $value->user_name ?> le <?= $value->topics_date ?></p>
                        </div>
                    </a>
                <?php        
                    }
                ?>
                <a class="text-center button btn-secondary text-white p-3 mt-2" href="inscription">Pas encore inscrit?</a>
        <?php
            }else{
        ?>
            <form method='POST' action="">
                <h2 class="font-weight-light"></h2>
                    <?php
                        foreach($topics_info as $value){
                    ?>
                        <div class="row">
                            <a class="card col-md-12" href="sujet?topics_id=<?= $value->topics_id ?>">
                                <div class="card-body">
                                    <h3 class="font-weight-bold"><?= $value->topics_subject ?></h3>
                                    <p class="font-italic text-secondary">Par <?=  $value->user_name ?> le <?= $value->topics_date ?></p>
                                </div>
                            </a>
                        </div>
                    <?php        
                        }
                }
                    ?>
            </form>
        </div>
     </div>   
    <?php include_once 'include/footer.php'; ?>
</body>
</html>