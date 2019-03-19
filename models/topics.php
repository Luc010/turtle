<?php
//    Définition d'une classe regroupant différents attributs et méthodes.
    class topics extends connect_DB{
//    Définition des attributs
        public $topics_id;
        public $topics_subject;
        public $topics_date;
        public $topics_cat;
        public $topics_by;
    
        public function __construct() {
            parent::__construct();
        }
        
        public function create_topic(){
            $query = 'INSERT INTO `turtle_DB`.`topics` (`topics_cat`,`topics_subject`,`topics_date`, `topics_by`) VALUES(:topicCat, :topicSubj, NOW(), :topicBy)';
            $result = $this->db->prepare($query);
            $result->bindValue('topicBy', $this->topics_by, PDO::PARAM_INT);
            $result->bindValue('topicCat', $this->topics_cat, PDO::PARAM_INT);
            $result->bindValue(':topicSubj', $this->topics_subject, PDO::PARAM_STR);
            if($result->execute()){
                return true;
            }
        }
        public function topics_cat(){
            $query = 'SELECT `topics_id`, `topics_subject`, DATE_FORMAT(`topics_date`, "%d-%m-%Y %H:%i:%s") AS `topics_date`, `topics_by`, `topics_cat`, `users`.`user_name`, `categories`.`cat_name` FROM `topics` JOIN `categories` ON `categories`.`cat_id` = `topics`.`topics_cat` JOIN `users` ON `users`.`user_id` = `topics`.`topics_by`';
            $result = $this->db->query($query);
            if($result){
                $topics_info = $result->fetchAll(PDO::FETCH_OBJ);
                return $topics_info;
            }
        }
        public function topics_infoByCatId(){
            $query = 'SELECT `topics_id`, `topics_subject`, DATE_FORMAT(`topics_date`, "%d-%m-%Y %H:%i:%s") AS `topics_date`, `topics_by`, `topics_cat`, `users`.`user_name` FROM `topics` JOIN `users` ON `users`.`user_id` = `topics`.`topics_by` WHERE `topics`.`topics_cat` = :catId ORDER BY `topics_date` DESC';
            $result = $this->db->prepare($query);
            $result->bindValue(':catId', $this->topics_cat, PDO::PARAM_STR);
            if($result->execute()){
                $topics_info = $result->fetchAll(PDO::FETCH_OBJ);
                return $topics_info;
            }
        }
        public function topics_infoById(){ 
            $query = 'SELECT `topics_id`, `topics_subject`, DATE_FORMAT(`topics_date`, "%d-%m-%Y %H:%i:%s") AS `topics_date`, `topics_by`, `topics_cat`, `users`.`user_name` FROM `topics` JOIN `users` ON `users`.`user_id` = `topics`.`topics_by` WHERE `topics_id` = :topicsId';
            $result = $this->db->prepare($query);
            $result->bindValue(':topicsId', $this->topics_id, PDO::PARAM_STR);
            if($result->execute()){
                $topics_info = $result->fetchAll(PDO::FETCH_OBJ);
                return $topics_info;
            }
        }
        public function topic_check(){        
            $query = 'SELECT COUNT(`topics_subject`) AS nbSubject FROM `topics` WHERE `topics_cat` = :topicCat';
            $result = $this->db->prepare($query);
            $result->bindValue(':topicCat', $this->topics_cat, PDO::PARAM_INT);
            if($result->execute()){
                if(is_object($result)){
                    $checkSubject = $result->fetch(PDO::FETCH_OBJ);
                    return $checkSubject;
                }
            }
        }
    }

