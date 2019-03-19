<?php
//    Définition d'une classe regroupant différents attributs et méthodes.
    class user extends connect_DB{
//    Définition des attributs
        public $user_id;
        public $user_role;
        public $user_pseudo;
        public $user_civility;
        public $user_firstname;
        public $user_lastname;
        public $user_experience;
        public $user_name;
        public $user_mail;
        public $user_password;
    
        public function __construct() {
            parent::__construct();
        }
        // DOCUMENTATION CODE
        /**
         * @return boolean
         */
        
        //                   CREATION SESSION UTILISATEUR                       \\
        public function user_connect(){
            $query = "SELECT * FROM `users` WHERE `user_name` = :pseudo OR `user_mail` = :pseudo ";
            $userLog = $this->db->prepare($query);
            $userLog->bindValue(':pseudo', $this->user_pseudo, PDO::PARAM_STR);
            // On vérifie que la requête s'est bien exécutée
            if($userLog->execute()){
                // On recherche les entrées correspondantes.
                $result = $userLog->fetch(PDO::FETCH_OBJ);
                if(is_object($result)){
                // On hydrate
                    $this->user_id = $result->user_id;
                    $this->user_role = $result->user_role;
                    $this->user_password = $result->user_password;
                    $this->user_name = $result->user_name;
                    $this->user_mail = $result->user_mail;
                }
                return true;
            }
        }
        // DOCUMENTATION CODE
        /**
         * @return boolean
         */
        
        //                   CREATION COMPTE UTILISATEUR                 \\   
        public function user_add(){
            $query = 'INSERT INTO `users` (`user_role`,`user_date`,`user_civility`, `user_lastname`, `user_firstname`, `user_experience`, `user_name`, `user_mail`, `user_password`) VALUES (1, NOW(), :civility, :lastname, :firstname, :experience, :username, :mail, :password)';
            $result = $this->db->prepare($query);
            $result->bindValue(':civility', $this->user_civility, PDO::PARAM_STR);
            $result->bindValue(':lastname', $this->user_lastname, PDO::PARAM_STR);
            $result->bindValue(':firstname', $this->user_firstname, PDO::PARAM_STR);
            $result->bindValue(':experience', $this->user_experience, PDO::PARAM_STR);
            $result->bindValue(':username', $this->user_name, PDO::PARAM_STR);
            $result->bindValue(':mail', $this->user_mail, PDO::PARAM_STR);
            $result->bindValue(':password', $this->user_password, PDO::PARAM_STR);
            if($result->execute()){ 
               return true;
            }    
        }
        // On vérifie si un nom d'utisateur est présent dans la base de données
        /**
         * @return boolean
         */
        
        public function user_checkUserName() {
            $query = 'SELECT COUNT(`user_name`) AS nbPseudo FROM `users` WHERE `user_name` = :userName';
            $checkMatch = $this->db->prepare($query);
            $checkMatch->bindValue(':userName', $this->user_name, PDO::PARAM_STR);
            $checkMatch->execute();
            if(is_object($checkMatch)){
                $checkUsername = $checkMatch->fetch(PDO::FETCH_OBJ);
                return $checkUsername;
            }
        }
        public function user_checkPassword() {
            $query = 'SELECT COUNT(`user_password`) AS nbPass FROM `users` WHERE `user_password` = :userPass';
            $checkMatch = $this->db->prepare($query);
            $checkMatch->bindValue(':userPass', $this->user_password, PDO::PARAM_STR);
            $checkMatch->execute();
            if(is_object($checkMatch)){
                $checkPassword = $checkMatch->fetch(PDO::FETCH_OBJ);
                return $checkPassword;
            }
        }
        public function user_editPassword() {
            $query = 'UPDATE `users` SET `user_password` = :userPass WHERE `user_id` = :userId';
            $checkMatch = $this->db->prepare($query);
            $checkMatch->bindValue(':userId', $this->user_id, PDO::PARAM_INT);
            $checkMatch->bindValue(':userPass', $this->user_password, PDO::PARAM_STR);
            if($checkMatch->execute()){
              return true;
            }
        }
        // On vérifie si une adresse mail est présente dans la base de données
        /**
         * @return boolean
         */
        
        public function user_checkMail(){
            $query = 'SELECT COUNT(`user_mail`) AS nbMail FROM `users` WHERE `user_mail` = :mail';
            $checkMatch = $this->db->prepare($query);
            $checkMatch->bindValue(':mail', $this->user_mail, PDO::PARAM_STR);
            $checkMatch->execute();
            if(is_object($checkMatch)){
                $checkMail= $checkMatch->fetch(PDO::FETCH_OBJ);
                return $checkMail;
            }
        }
        // On affiche les informations de l'utilisateur
        /**
         * @return boolean
         */
        
        public function user_info(){
            $query = 'SELECT `user_id`, `user_experience`, `user_firstname`, `user_lastname`, `user_civility`, DATE_FORMAT(`user_date`, "%d-%m-%Y") AS `user_date`, `user_mail`, `user_name`, `user_role`, `role_status` FROM `users` JOIN `role` ON `user_id` = :userId AND `user_role` = `role_id`';
            $result = $this->db->prepare($query);
            $result->bindValue(':userId', $this->user_id, PDO::PARAM_INT);
            if($result->execute()){
                $userInfo = $result->fetch(PDO::FETCH_OBJ);
                return $userInfo;
            }
        }
        // Mis à jour des entrées du compte utilsateur.
        /**
         * @return boolean
         */
        
        //                   MIS À JOUR COMPTE UTILISATEUR           \\   
        public function user_editInfo(){
            $query = 'UPDATE `users` SET `user_lastname` = :lastname, `user_firstname` = :firstname, `user_experience` = :experience, `user_civility` = :civility WHERE `user_id` = :userId';
            $result = $this->db->prepare($query);
            $result->bindValue(':userId', $this->user_id, PDO::PARAM_INT);
            $result->bindValue(':civility', $this->user_civility, PDO::PARAM_STR);
            $result->bindValue(':lastname', $this->user_lastname, PDO::PARAM_STR);
            $result->bindValue(':firstname', $this->user_firstname, PDO::PARAM_STR);
            $result->bindValue(':experience', $this->user_experience, PDO::PARAM_STR);
            if($result->execute()){ 
               return true;
            }
        }
        // On cherche à afficher les informations de tous les utilisateurs enregistrés dans la base de données.
        /**
         * @return boolean
         */
        
        public function user_listInfo(){
            $query = 'SELECT `user_id`, `user_experience`, `user_firstname`, `user_lastname`, `user_civility`, DATE_FORMAT(`user_date`, "%d-%m-%Y") AS `user_date`, `user_mail`, `user_name`, `user_role`, `role_status` FROM `users` JOIN `role` ON `role_id` = `user_role` AND `user_role` != 3';
            $result = $this->db->query($query);
            if($result->execute()){
                $user_listInfo = $result->fetchAll(PDO::FETCH_OBJ);
                return $user_listInfo;
            }
        }
        // La méthode suivante sert à mettre à jour le nom d'utilisateur.
        /**
         * @return boolean
         */
        
        public function user_editUserName(){
            $query = 'UPDATE `users` SET `user_name` = :userName WHERE `user_id` = :userId';
            $result = $this->db->prepare($query);
            $result->bindValue(':userId', $this->user_id, PDO::PARAM_INT);
            $result->bindValue(':userName', $this->user_name, PDO::PARAM_STR);
            if($result->execute()){ 
               return true;
            }
        }
        // La méthode suivante sert à mettre à jour le mail de connexion.
        /**
         * @return boolean
         */
        
        public function user_editMail(){
            $query = 'UPDATE `users` SET `user_mail` = :mail WHERE `user_id` = :userId';
            $result = $this->db->prepare($query);
            $result->bindValue(':userId', $this->user_id, PDO::PARAM_INT);
            $result->bindValue(':mail', $this->user_mail, PDO::PARAM_STR);
            if($result->execute()){ 
               return true;
            }
        } 
        //  SUPPRESSION COMPTE UTILISATEUR  
        /**
         * @return boolean
         */
        
        public function user_delete(){
            $query = 'DELETE FROM `users` WHERE `user_id` = :userId';
            $result = $this->db->prepare($query);
            $result->bindValue(':userId', $this->user_id, PDO::PARAM_INT);
            if($result->execute()){ 
                return true;
            }  
        } 
}