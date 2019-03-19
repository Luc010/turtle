<?php 
    session_start();
    $title = 'Liste des sujets';
    include_once 'include/header.php';
    include_once 'include/navbar.php';
    require_once '../controllers/posts_formCtrl.php'
?>
<body>
    <div class="container-fluid">
        <div class="row">
            <div id="border">
                <?php
                    foreach($topics_info as $value){
                ?>
                    <h1 class="text-white font-weight-bold"><?= $value->topics_subject ?></h1>
                <?php        
                    }
                ?>
            </div>
        </div>
    <?php 
        if(empty($posts_info)){
    ?>
            <div class="card p-5">
                <p>Oups, pas de réaction pour l´instant...</p>
            </div>
            <a class="text-center button btn-secondary text-white p-3" href="inscription">Pas encore inscrit?</a>
    <?php
        }elseif(empty($_SESSION['id'])){
            foreach($posts_info as $value){
    ?>        
                <div class="col-12 col-md-8">
                    <div class="card">
                        <div class="card-header">
                          <span><?= $value->user_name ?></span> a répondu le <?= $value->post_date ?> Niveau:<?= $value->user_experience ?>.
                        </div>
                        <div class="card-body">
                            <h5>Message</h5>
                            <p class="mb-0"><?= $value->post_content?></p>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
            <a class="text-center button btn-secondary text-white p-3" href="inscription">Pas encore inscrit?</a>
            <a class="text-center button btn-secondary text-white p-3" href="connexion">Pas encore connecté?</a>
    <?php
        }else{
            foreach($posts_info as $value){
    ?>
                <div class="col-12 col-md-8">
                  <div class="card">
                    <div class="card-header">
                      <span><?= $value->user_name ?></span> a répondu le <?= $value->post_date ?> Niveau:<?= $value->user_experience ?>.
                    </div>
                    <div class="card-body">
                      <h5>Message</h5>
                      <p class="mb-0"><?= $value->post_content?></p>
                    </div>
                  </div>
                </div>
        <?php
            }
        ?>
            <form method='POST' action="">
                <div class="row">
                    <div class="col-12 col-md-8">
                      <div class="card">
                        <div class="card-body">
                            <h5>Répondre</h5>
                            <p class="text-danger"><small><?= (isset($formErrors['posts_content'])) ? $formErrors['posts_content'] : '' ?></small></p>
                            <textarea class="w-100"name="posts_content" rows="10" cols="200" /></textarea>
                            <input class="btn-lg btn-block w-25 btn-secondary text-white font-weight-bold mt-1" name="submit" type="submit" value="Enregistrer" />
                        </div>
                      </div>
                    </div>
                </div>
            </form>
    <?php
        }
    ?>
    </div>
    <?php include_once 'include/footer.php' ?>
</body>
</html>