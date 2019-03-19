<?php
    // On charge la page autoload.
    require_once '../autoload.php';
    // On charge tous nos modèles. 
    spl_autoload_register('uploadClass');
    $message = '';
    $category = new category();
    $cat_info = $category->cat_info();

    $topics = new topics();
    $topics_info = $topics->topics_cat();

