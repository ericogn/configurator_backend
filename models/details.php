<?php

class Details{

        
        private $table = "details";
        private $conn;
        public $id;
        private $proj;
        //public $id;
        public $name;
        public $reforderno;
        public $address;
        public $city;
        public $country;
        public $state;
        public $zip;
        public $primarycontact;
        public $engarch;
        public $contractor;
        public $status;
        public $type;
        public $design;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function read(){
            $query = "SELECT * FROM " . $this->table ."";

            //prepare statement
            $statement = $this->conn->prepare($query);
            $statement->execute();
    
            return $statement;
        }

        public function retriveID(){
            $qry = "SELECT id FROM " .$this->table ."ORDER BY id DESC LIMIT 1";
            $statement = $this->conn->prepare($qry);
            $statement->execute();
            return $statement;
        }

        public function insert(){
            $qry = "INSERT IGNORE INTO " .$this->table ."
            SET
            name=:name,
            reforderno=:reforderno,
            address=:address,
            city=:city,
            country=:country,
            state=:state,
            zip=:zip,
            primarycontact=:primarycontact,
            engarch=:engarch,
            owner=:owner,
            contractor=:contractor,
            status=:status,
            type=:type,
            design=:design
            ";

            //sanitize
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->reforderno=htmlspecialchars(strip_tags($this->reforderno));
            $this->address=htmlspecialchars(strip_tags($this->address));
            $this->city=htmlspecialchars(strip_tags($this->city));
            $this->country=htmlspecialchars(strip_tags($this->country));
            $this->state=htmlspecialchars(strip_tags($this->state));
            $this->zip=htmlspecialchars(strip_tags($this->zip));
            $this->primarycontact=htmlspecialchars(strip_tags($this->primarycontact));
            $this->engarch=htmlspecialchars(strip_tags($this->engarch));
            $this->owner=htmlspecialchars(strip_tags($this->owner));
            $this->contractor=htmlspecialchars(strip_tags($this->contractor));
            $this->status=htmlspecialchars(strip_tags($this->status));
            $this->type=htmlspecialchars(strip_tags($this->type));
            $this->design=htmlspecialchars(strip_tags($this->design));

            $statement = $this->conn->prepare($qry);
            //binding

            $statement->bindParam(":name",$this->name);
            $statement->bindParam(":reforderno",$this->reforderno);
            $statement->bindParam(":address",$this->address);
            $statement->bindParam(":city",$this->city);
            $statement->bindParam(":country",$this->country);
            $statement->bindParam(":state",$this->state);
            $statement->bindParam(":zip",$this->zip);
            $statement->bindParam(":primarycontact",$this->primarycontact);
            $statement->bindParam(":engarch",$this->engarch);
            $statement->bindParam(":owner",$this->owner);
            $statement->bindParam(":contractor",$this->contractor);
            $statement->bindParam(":status",$this->status);
            $statement->bindParam(":type",$this->type);
            $statement->bindParam(":design",$this->design);

            if ($statement->execute()){
                return true;
            }return false;
        }
}

?>