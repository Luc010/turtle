<?php
//    Définition d'une classe regroupant différents attributs et méthodes.
    class posts extends connect_DB{
//    Définition des attributs
        public $post_id;
        public $post_date;
        public $post_content;
        public $post_by;
        public $post_topic;
        
        public function __construct(){
            parent::__construct();
        }
        
        public function create_posts(){
            $query = 'INSERT INTO `posts` (`post_date`,`post_content`, `post_by`, `post_topic` ) VALUES(NOW(), :postContent, :postBy, :postTopics)';
            $result = $this->db->prepare($query);
            $result->bindValue(':postTopics', $this->post_topic, PDO::PARAM_INT);
            $result->bindValue(':postContent', $this->post_content, PDO::PARAM_STR);
            $result->bindValue(':postBy', $this->post_by, PDO::PARAM_INT);
            if($result->execute()){
                return true;
            }
        }
         public function posts_infoById(){
            $query = 'SELECT `post_id`, DATE_FORMAT(`post_date`, "%d-%m-%Y  %H:%i:%s") AS `post_date`, `post_content`, `post_by`, `post_topic`, `users`.`user_name`,`users`.`user_experience`, `topics`.`topics_subject` FROM `posts` JOIN `topics` ON `topics`.`topics_id` = `posts`.`post_topic` JOIN `users` ON `users`.`user_id` = `posts`.`post_by` WHERE `post_topic` = :postId';
            $result = $this->db->prepare($query);
            $result->bindValue(':postId', $this->post_topic, PDO::PARAM_INT);
            if($result->execute()){
                $posts_info = $result->fetchAll(PDO::FETCH_OBJ);
                return $posts_info;
            }
        }
    }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

