<?php
//    Définition d'une classe regroupant différents attributs et méthodes.
    class role extends connect_DB{
//    Définition des attributs
        public $role_id;
        public $role_status;
    
        public function __construct() {
            parent::__construct();
        }
    }

