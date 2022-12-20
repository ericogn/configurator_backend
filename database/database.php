<?php
    class Database{
 
        // specify your own database credentials
        //private $host = "configurator";            //Server
        private $host = "162.241.226.133";          //bluehost server
        private $db_name = "greenref_configurator";       //Database Name
        private $username = "greenref";             //UserName of Phpmyadmin
        private $pass = "2WsXdR5%";                 //Password associated with username
        public $conn;
     
        // get the database connection
        public function getConnection(){
     
            $this->conn = null;
     
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->pass);
                $this->conn->exec("set names utf8");
                $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
                //$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $exception){
                echo "Connection error: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }
?>