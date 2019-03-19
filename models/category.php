<?php
//    Définition d'une classe regroupant différents attributs et méthodes.
    class category extends connect_DB{
//    Définition des attributs
        public $cat_id;
        public $cat_name;
        public $cat_description;
    
        public function __construct() {
            parent::__construct();
        }
        
        public function create_category(){
            $query = 'INSERT INTO `categories` (`cat_name`,`cat_description`) VALUES(:catName, :catDesc)';
            $result = $this->db->prepare($query);
            $result->bindValue(':catName', $this->cat_name, PDO::PARAM_STR);
            $result->bindValue(':catDesc', $this->cat_description, PDO::PARAM_STR);
            if($result->execute()){
                return true;
            }
        }
        public function cat_info(){
            $query = 'SELECT DISTINCT `categories`.`cat_name`, `categories`.`cat_id`, `categories`.`cat_description` FROM `categories` GROUP BY `cat_name`';
            $result = $this->db->query($query);
            if($result){
                $cat_info = $result->fetchAll(PDO::FETCH_OBJ);
                return $cat_info;
            }
        }
        public function cat_infoById(){        
            $query = 'SELECT `cat_name`, `cat_id` FROM `categories` WHERE `cat_id` = :catId';
            $result = $this->db->prepare($query);
            $result->bindValue(':catId', $this->cat_id, PDO::PARAM_INT);
            if($result->execute()){
                $cat_info = $result->fetchAll(PDO::FETCH_OBJ);
                return $cat_info;
            }
        }
    }

