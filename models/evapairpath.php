<?php
    class EvapAirPath{
        private $conn;
        private $table = "evapairpath";

        public $name;
        public $price;

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

        function insert(){
            // query to insert record of new user signup
            $query = "INSERT INTO
                        " . $this->table . "
                    SET
                        name=:name, price=:price";
            // prepare query
            $stmt = $this->conn->prepare($query);
            // sanitize
            // $this->username=htmlspecialchars(strip_tags($this->name));
            // $this->password=htmlspecialchars(strip_tags($this->price));       
            // bind values
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":price", $this->price);
        
            // execute query
            if($stmt->execute()){
                $this->id = $this->conn->lastInsertId();
                return true;
            }
            return false;   
        }
    }
?>