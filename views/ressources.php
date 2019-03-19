<?php 
    session_start();
    require_once '../controllers/ressourcesCtrl.php';
    $title = 'Ressources';
    include_once 'include/header.php';
    include_once 'include/navbar.php';
?>
<body>
    <div id="border" class="text-left text-white col-md-12 mb-5">
        <h1 class="text-white font-weight-bold">
            Tutoriels video 
        </h1>
    </div>
    <section class="wrapper">
        <div class="container-fostrap">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">
                            <div class="card">
                                <a class="img-card" href="">
                                    <img src="../assets/img/src.jpg" />
                                </a>
                                <div class="card-content">
                                    <h4 class="card-title">
                                        <a href=""> 1er jour de classe
                                      </a>
                                    </h4>
                                    <p class="">
                                      Comment gérer une classe dés votre premier jour de travail. Des conseils d'experts pour une rentrée assurée sans aucun stress.  
                                    </p>
                                </div>
                                <div class="card-read-more">
                                    <?php
                                        if(isset($_SESSION['id'])){
                                    ?>
                                    <a href="" class="btn btn-link btn-block"><i class="fas fa-lock-open"></i>
                                        Accéder au cours
                                    </a>
                                    <?php
                                        }else{
                                    ?>
                                    <a href="connexion" data-toggle="modal" data-target="#exampleModal" type="submit" title="connexion" class="btn btn-link btn-block"><i class="fas fa-lock"></i>
                                        Accéder au cours
                                    </a>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="card">
                                <a class="img-card" href="">
                                    <img src="../assets/img/src2.jpg" />
                                </a>
                                <div class="card-content">
                                    <h4 class="card-title">
                                        <a href=""> Fatigué, Énervé?
                                      </a>
                                    </h4>
                                    <p class="">
                                        Fatigués de vous répétez, marre d'avoir peu d'élèves motivées et à l'écoutes. Nous avons préparez ce tutoriel pour vous, avec l'aide de méthodes et techniques internationales qui ont fait leurs preuves.
                                    </p>
                                </div>
                                <div class="card-read-more">
                                    <?php
                                        if(isset($_SESSION['id'])){
                                    ?>
                                    <a href="" class="btn btn-link btn-block"><i class="fas fa-lock-open"></i>
                                        Commencer ce cours
                                    </a>
                                    <?php
                                        }else{
                                    ?>
                                    <a href="connexion" data-toggle="modal" data-target="#exampleModal" type="submit" title="connexion" class="btn btn-link btn-block"><i class="fas fa-lock"></i>
                                        Commencer ce cours
                                    </a>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="card">
                                <a class="img-card" href="">
                                <img src="../assets/img/src3.jpg" alt=""/>
                              </a>
                                <div class="card-content">
                                    <h4 class="card-title">
                                        <a href="">Remplaçant dans un nouvel établissement</a>
                                    </h4>
                                    <p class="">
                                        Faisons un point sur vos capacités à gérer vos élèves lors d'un remplacement.
                                    </p>
                                </div>
                                <div class="card-read-more">
                                    <?php
                                        if(isset($_SESSION['id'])){
                                    ?>
                                    <a href="" class="btn btn-link btn-block"><i class="fas fa-lock-open"></i>
                                        Accéder au cours
                                    </a>
                                    <?php
                                        }else{
                                    ?>
                                    <a href="connexion" data-toggle="modal" data-target="#exampleModal" type="submit" title="connexion" class="btn btn-link btn-block"><i class="fas fa-lock"></i>
                                        Accéder au cours
                                    </a>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <form class="form-group" action="" method="POST">
        <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
          <div class="modal-dialog-centered mx-auto" role="document">
            <div class="modal-content">
              <div class="modal-header bg-dark p-2">
                <h5 class="modal-title text-white font-weight-bold" id="modal">Connexion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <label for="pseudo">Identifiant de connexion</label>
                  <input type="text" id="pseudo" class="form-control" name="pseudo" value="" placeholder="example@exemple.fr"/>
                  <p class="text-danger"><small><?= (isset($formErrors['pseudo'])) ? $formErrors['pseudo'] : '' ?></small></p>
                  <label for="password">Mot de passe</label>
                  <input type="password" id="password" class="form-control" name="password" />
                  <p class="text-danger"><small><?= (isset($formErrors['password'])) ? $formErrors['password'] : '' ?></small></p>
              </div>
              <div class="modal-footer">
                <input type="submit" name="submit" class="btn-block btn-lg btn-warning mt-2" value="Connexion" id="submit" />
                <a class="btn-block btn-lg text-center button text-white p-3 mt-2" href="inscription">Pas encore inscrit?</a>
              </div>
            </div>
          </div>
        </div>
    </form>
<?php include_once 'include/footer.php';?>
</body>
</html>