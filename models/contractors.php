<?php
    class Contractors{
        private $conn;
        private $table = "contractors";

        public $name;
        public $tochange;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function read(){
            $query = 'SELECT * FROM ' .$this -> table ;

            //prepare statement
            $statement = $this->conn->prepare($query);
            $statement->execute();
    
            return $statement;
        }

        function update(){
            // query to insert record of new user signup
            $query = "UPDATE
                        " . $this->table . "
                    SET
                        name =:name
                        WHERE name =:tochange";
            // prepare query
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->tochange=htmlspecialchars(strip_tags($this->tochange));

            $stmt = $this->conn->prepare($query);
            // sanitize
            // $this->username=htmlspecialchars(strip_tags($this->name));
            // $this->password=htmlspecialchars(strip_tags($this->price));       
            // bind values
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":tochange", $this->tochange);
        
            // execute query
            if($stmt->execute()){
                return true;
            }
            return false;   
        }
        function insert(){
            // query to insert record of new user signup
            $query = "INSERT IGNORE INTO
                        " . $this->table . "
                    SET
                        name=:name";
            // prepare query
            $this->name=htmlspecialchars(strip_tags($this->name));

            $stmt = $this->conn->prepare($query);
            // sanitize
            // $this->username=htmlspecialchars(strip_tags($this->name));
            // $this->password=htmlspecialchars(strip_tags($this->price));       
            // bind values
            $stmt->bindParam(":name", $this->name);
        
            // execute query
            if($stmt->execute()){
                return true;
            }
            return false;   
        }

        function delete(){
             $query = "DELETE FROM
                        " . $this->table . "
                    WHERE
                        name=:name";
            // prepare query
            $this->name=htmlspecialchars(strip_tags($this->name));

            $stmt = $this->conn->prepare($query);
            // sanitize
            // $this->username=htmlspecialchars(strip_tags($this->name));
            // $this->password=htmlspecialchars(strip_tags($this->price));       
            // bind values
            $stmt->bindParam(":name", $this->name);
        
            // execute query
            if($stmt->execute()){
                return true;
            }
            return false;   
        }
    }
?>