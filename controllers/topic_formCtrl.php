<?php
    // On charge la page autoload.
    require_once '../autoload.php';
    // On charge tous nos modèles. 
    spl_autoload_register('uploadClass');
    $formErrors = [];
    $category = new category();
    $cat_info = $category->cat_info();
   
    if(isset($_POST['submit'])){
            $topics = new topics();
            $topics_info = $topics->topics_infoById();
            $category = new category();
            $cat_info = $category->cat_info();
        if(!empty($_POST['topics_cat']) && $_POST['topics_subject']){
            if(isset($_POST['topics_cat'])){
                $topics->topics_cat = htmlspecialchars($_POST['topics_cat']);
            }
            if(isset($_POST['topics_subject'])){
                $topics->topics_subject = htmlspecialchars($_POST['topics_subject']);  
            }else{
                $formErrors['topic_subject'] = 'Champ incorrect'; 
            }
        }else{
            $formErrors['topic_subject'] = 'Les champs sont vides'; 
        }
        if(count($formErrors) == 0){
            $topics = new topics();
            $topics->topics_by = $_SESSION['id'];
            $topics->topics_cat = htmlspecialchars($_POST['topics_cat']);
            $topics->topics_subject = htmlspecialchars($_POST['topics_subject']);
            $topics->create_topic();
            header('location: ../aide-partage');
        }
    }
    