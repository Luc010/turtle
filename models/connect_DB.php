<?php
//On crée une fonction qui permettra la connexion à notre base de données.
    class connect_DB{
        protected $db;
        public function __construct(){
            try{
                $this->db = new PDO('mysql:host=127.0.0.1;dbname=turtle_DB;charset=utf8', 'Luc', 'test');
                return $this;
            }
            catch(Exception $e){
                   die('Erreur : '.$e->getMessage());
            }
        }
    }