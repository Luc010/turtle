<?php
// On charge tous nos modèles. 
    function uploadClass($class){
// On inclut la classe correspondante au paramètre passé
      require 'models/'.$class.'.php';
    }
