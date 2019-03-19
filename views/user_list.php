<?php 
    session_start();
    require_once '../controllers/user_listCtrl.php';
    $title = 'Liste des utilisateurs';
    include_once 'include/header.php';
    include_once 'include/navbar.php';
?>
<body> 
    <div class="container-fluid  p-0">
        <div id="border" class="row">
            <h1 class="text-white font-weight-bold">Liste des utilisateurs</h1>
        </div>
        <div class="row">
            <form class="col-md-12 p-0" method='POST' action="">
                <table>
                    <tr>
                        <th>N° Utilisateur</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>E-mail</th>
                        <th>Nom d'utilisateur</th>
                        <th>Date de création</th>
                        <th>Type de compte</th>
                        <th>Suppression</th>
                    </tr>
                    <?php
                        foreach($user_listInfo as $value){
                    ?>
                            <tr>
                                <td><?= $value->user_id ?></td>
                                <td><?= $value->user_lastname ?></td>
                                <td><?= $value->user_firstname ?></td>
                                <td><?= $value->user_mail ?></td>
                                <td><?= $value->user_name ?></td>
                                <td><?= $value->user_date ?></td>
                                <td><?= $value->role_status ?></td>
                                <td><button type="submit" class="btn btn-secondary btn-block" value="<?= $value->user_id ?>" name="delete"</button>Supprimer</td>
                            </tr>
                    <?php        
                        }
                    ?>
                </table>
            </form>
        </div>
    </div>
    <?php include_once 'include/footer.php' ?>
</body>
</html>