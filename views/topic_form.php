<?php
    session_start();
    $title = 'Créer un sujet';
    require_once '../controllers/topic_formCtrl.php';
    include_once 'include/header.php';
    include_once 'include/navbar.php';
?>
<body>
    <div class="container-fluid">
        <h1 id="border" class="font-weight-bold text-white">Publier un sujet de discussion</h1>
        <div class="row">
            <div class="col-md-12">
                <form class="card form-group p-5" method="POST" action="">
                    <label for="topic_cat">Choix de la catégorie</label>
                    <select class="form-control w-25" id="topics_cat" name="topics_cat">
                        <option value="disabled selected value">Catégorie</option>
                        <?php
                            foreach($cat_info as $value){      
                        ?>
                        <option value="<?= $value->cat_id?>"><?= $value->cat_name ?></option>
                        <?php
                            }
                        ?>
                    </select>
                    <label for="topic_subject">Sujet de discussion</label>
                    <textarea id="topic_subject" class="form-control" name="topics_subject" rows="10" cols="50"/></textarea>
                    <p class="text-danger"><small><?= (isset($formErrors['topic_subject'])) ? $formErrors['topic_subject'] : '' ?></small></p>
                    <input class="btn-lg btn-block w-25 btn-secondary text-white font-weight-bold mt-1" name="submit" type="submit" value="Enregistrer" />
                </form>
            </div>
        </div>
    </div>
<?php include_once 'include/footer.php' ?>
</body>
</html>
