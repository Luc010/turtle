<?php
    // On charge la page autoload.
    require_once '../autoload.php';
    // On charge tous nos modèles. 
    spl_autoload_register('uploadClass');
    $formErrors = [];
    $controlTitle = '/^[0-9A-Za-zÄÖÜÑ§àèé@&_, .?!;:\']{1,40}$/';
    $controlText = '/^[0-9A-Za-zÄÖÜÑ§àèé@&_, .?!();:´\'ç]{1,250}$/';
     
    if(isset($_POST['submit'])){
        if(!empty($_POST['cat_name']) && $_POST['cat_description']){
            if(preg_match($controlTitle, $_POST['cat_name'])){
                $category->cat_name = htmlspecialchars($_POST['cat_name']);
                
            }else{
               $formErrors['cat_name'] = 'Champ incorrect'; 
            }
            if(preg_match($controlText, $_POST['cat_description'])){
                $category->cat_description = htmlspecialchars($_POST['cat_description']);
            }else{
                $formErrors['cat_description'] = 'Champ incorrect'; 
            }
        }else{
            $formErrors['cat_name'] = 'Champ vide'; 
        }
        if(count($formErrors) == 0){
            $category->create_category();
            header('location: ../aide-partage');
        }
    }
    