<?php
// On charge la page autoload.
require_once '../autoload.php';
// On charge tous nos modèles. 
spl_autoload_register('uploadClass');
$access = false;
$topics = new topics;
$topics_cat = $topics->topics_cat();

   
if(isset($_SESSION['id'])){
    $access = true;
}

if(isset($_GET['cat_id'])){
    $topics = new topics;
    $topics->topics_cat = $_GET['cat_id'];
    $topics_info = $topics->topics_infoByCatId();
    $category = new category;
    $category->cat_id = $_GET['cat_id'];
    $cat_info = $category->cat_infoById();
}

