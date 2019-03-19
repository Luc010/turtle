<?php
    // On charge la page autoload.
    require_once '../autoload.php';
    // On charge tous nos modèles. 
    spl_autoload_register('uploadClass');
    $formErrors = [];
   
    if(isset($_GET['topics_id']) ){
        $posts = new posts();
        $posts->post_topic = $_GET['topics_id'];
        $posts_info = $posts->posts_infoById();
        $topics = new topics;
        $topics->topics_id = $_GET['topics_id'];
        $topics_info = $topics->topics_infoById();
    }
   
    if(isset($_POST['submit'])){
            $topics = new topics();
            $topics_info = $topics->topics_cat();
            $category = new category();
            $cat_info = $category->cat_info();
        if(!empty($_POST['posts_content'])){
            if(isset($_POST['posts_content'])){
                $posts->post_content = htmlspecialchars($_POST['posts_content']);
            }
        }else{
            $formErrors['posts_content'] = 'Les champs sont vides'; 
        }
        if(count($formErrors) == 0){
            $posts = new posts();
            $posts->post_by = $_SESSION['id'];
            $posts->post_topic = $_GET['topics_id'];
            $posts->post_content = htmlspecialchars($_POST['posts_content']);
            $posts->create_posts();
        }
    }

