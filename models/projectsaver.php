<?php
    class Project{
        private $conn;
        private $table = "projectsaver";
        private $detailsTable ="details";
        public $details;
        public $email;
        public $email2;
        public $email3;
        public $id;
        public $t;
        
        public function __construct($db) {
            $this->conn = $db;
        }

        //select projects by email.
        public function read(){
            $query = "SELECT * FROM projectsaver WHERE email='".$this->email."'";

            //prepare statement
            $statement = $this->conn->prepare($query);
            $statement->execute();
    
            return $statement;
        }

        public function readbyid(){
            $query = "SELECT * FROM projectsaver WHERE details=".$this->details."";

            //prepare statement
            $statement = $this->conn->prepare($query);
            $statement->execute();
    
            return $statement;
        }

        

        public function delete(){
            $qry1 = "DELETE FROM ".$this->table."
            WHERE details = ".$this->details."";

            $qry2 = "DELETE FROM ".$this->detailsTable."
            WHERE id = ".$this->details."";

            $statement1 = $this->conn->prepare($qry1);
            $statement2 = $this->conn->prepare($qry2);

            if($statement1->execute() && $statement2->execute()){
                return true;
            }return false;
        }


        public function getdetailsbyid(){
            $qry = "SELECT * FROM details
            right join projectsaver
            on details.id = projectsaver.details
            where projectsaver.email = '".$this->email2."'
            ORDER BY id DESC ";

            $statement = $this->conn->prepare($qry);
            $statement->execute();
            return $statement;
        }

        public function readwithdetails(){
            $query = "SELECT * FROM details
            right join projectsaver
            on details.id = projectsaver.details
            where projectsaver.details = '".$this->details."'";

            //prepare statement
            $statement = $this->conn->prepare($query);
            $statement->execute();
    
            return $statement;
        }


        public function getUnitPerformances(){
            $qry = "SELECT * FROM unitperformances WHERE tons=".$this->details."";

            $statement = $this->conn->prepare($qry);
            $statement -> execute();
            return $statement;
        }
    }
?>




