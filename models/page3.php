<?php

    class Page3{
        private $conn;
        private $table = "unitperformances";
        public $tons;

        public $totalcooling;
        public $sensiblecooling;
        public $latdb;
        public $latwb;
        public $evapfan;
        public $evapmotor;
        public $mincfm;

        public function __construct($db){
            $this->conn = $db;
        }

        public function read(){
            $qry = "SELECT * FROM `unitperformances`
            WHERE tons= ".$this->tons."";

            $statement = $this->conn->prepare($qry);
            $statement->execute();
            return $statement;
        }

        public function update(){
            $qry="UPDATE `unitperformances`
            SET 
            totalcooling =:totalcooling,
            sensiblecooling =:sensiblecooling,
            latdb =:latdb,
            latwb =:latwb,
            evapfan =:evapfan,
            evapmotor =:evapmotor,
            mincfm =:mincfm
            WHERE tons =:tonnage
            ";

            $this->totalcooling=htmlspecialchars(strip_tags($this->totalcooling));
            $this->sensiblecooling=htmlspecialchars(strip_tags($this->sensiblecooling));
            $this->latdb=htmlspecialchars(strip_tags($this->latdb));
            $this->latwb=htmlspecialchars(strip_tags($this->latwb));
            $this->evapfan=htmlspecialchars(strip_tags($this->evapfan));
            $this->evapmotor=htmlspecialchars(strip_tags($this->evapmotor));
            $this->mincfm=htmlspecialchars(strip_tags($this->mincfm));
            $this->tonnage=htmlspecialchars(strip_tags($this->tonnage));

            $statement = $this->conn->prepare($qry);

            $statement->bindParam(":totalcooling",$this->totalcooling);
            $statement->bindParam(":sensiblecooling",$this->sensiblecooling);
            $statement->bindParam(":latdb",$this->latdb);
            $statement->bindParam(":latwb",$this->latwb);
            $statement->bindParam(":evapfan",$this->evapfan);
            $statement->bindParam(":evapmotor",$this->evapmotor);
            $statement->bindParam(":mincfm",$this->mincfm);
            $statement->bindParam(":tonnage",$this->tonnage);

            if($statement->execute()){
                return true;
            }return false;

        }

    }


?>