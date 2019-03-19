<?php
    session_start();
    $title = 'Créer une catégorie';
    require_once '../controllers/category_formCtrl.php';
    include_once 'include/header.php';
    include_once 'include/navbar.php';
?>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form class="card form-group p-5 center" method="POST" action="">
                    <div class="card-title text-secondary m-0">Créer une catégorie</div>
                    <label for="cat_name">Intitulé</label>
                    <input class="form-control w-25" type="text" name="cat_name" />
                    <p class="text-danger"><small><?= (isset($formErrors['cat_name'])) ? $formErrors['cat_name'] : '' ?></small></p>
                    <label for="cat_description">Description</label>
                    <textarea class="form-control" name="cat_description" rows="10" cols="200"/></textarea>
                    <p class="text-danger"><small><?= (isset($formErrors['cat_description'])) ? $formErrors['cat_description'] : '' ?></small></p>
                    <input class="btn-lg btn-block w-25 btn-secondary text-white font-weight-bold mt-1" name="submit" type="submit" value="Enregistrer" />
                </form>
            </div>
        </div>
    </div>
<?php include_once 'include/footer.php' ?>
</body>
</html>
