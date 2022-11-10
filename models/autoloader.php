<?php
    class Autoloader{
        private $conn;
        private $table = "autoloader";

        public $tonnage;
        public $voltage;
        

        public $scfmret;
        public $scfmout;
        public $esp;
        public $eatdb1ret;
        public $eatdb1mix;
        public $eatwb1ret; 
        public $eatwb1mix; 
        public $gpm1;
        public $eft1; 
        public $evapfiltertype;
        public $heattype; 
        public $reheattype; 
        public $airsideecon; 
        public $eatf;
        public $approxlat;
        public $eft2; 
        public $lftgpm; 
        public $eatdb2; 
        public $eatwb2; 
        public $eft3; 
        public $approxbtuh;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function read(){
            $query = "SELECT * FROM `autoloader` WHERE tonnage = ".$this->tonnage." AND voltage = ".$this->voltage."";

            //prepare statement
            $statement = $this->conn->prepare($query);
            $statement->execute();
    
            return $statement;
        }

        public  function readall(){
            $query = "SELECT * FROM `autoloader`";

            //prepare statement
            $statement = $this->conn->prepare($query);
            $statement->execute();
    
            return $statement;
        }
        function update(){
            // query to insert record of new user signup
            $query = "UPDATE `autoloader`
            SET
            scfmret =:scfmret,
            scfmout =:scfmout,
            esp =:esp,
            eatdb1ret =:eatdb1ret,
            eatdb1mix =:eatdb1mix,
            eatwb1ret =:eatwb1ret,
            eatwb1mix =:eatwb1mix,
            gpm1 =:gpm1,
            eft1 =:eft1,
            evapfiltertype =:evapfiltertype,
            heattype =:heattype,
            reheattype =:reheattype,
            airsideecon =:airsideecon,
            eatf =:eatf,
            approxlat =:approxlat,
            eft2 =:eft2,
            lftgpm =:lftgpm,
            eatdb2 =:eatdb2,
            eatwb2 =:eatwb2,
            eft3 =:eft3,
            approxbtuh =:approxbtuh
            WHERE (tonnage =:tonnage AND voltage =:voltage) 
            " ;
            // prepare query
            //
            $this->scfmret=htmlspecialchars(strip_tags($this->scfmret));
            $this->scfmout=htmlspecialchars(strip_tags($this->scfmout));
            $this->esp=htmlspecialchars(strip_tags($this->esp));
            $this->eatdb1ret=htmlspecialchars(strip_tags($this->eatdb1ret));
            $this->eatdb1mix=htmlspecialchars(strip_tags($this->eatdb1mix));
            $this->eatwb1ret=htmlspecialchars(strip_tags($this->eatwb1ret));
            $this->eatwb1mix=htmlspecialchars(strip_tags($this->eatwb1mix));
            $this->gpm1=htmlspecialchars(strip_tags($this->gpm1));
            $this->eft1=htmlspecialchars(strip_tags($this->eft1));
            $this->evapfiltertype=htmlspecialchars(strip_tags($this->evapfiltertype));
            $this->heattype=htmlspecialchars(strip_tags($this->heattype));
            $this->reheattype=htmlspecialchars(strip_tags($this->reheattype));
            $this->airsideecon=htmlspecialchars(strip_tags($this->airsideecon));
            $this->eatf=htmlspecialchars(strip_tags($this->eatf));
            $this->approxlat=htmlspecialchars(strip_tags($this->approxlat));
            $this->eft2=htmlspecialchars(strip_tags($this->eft2));
            $this->lftgpm=htmlspecialchars(strip_tags($this->lftgpm));
            $this->eatdb2=htmlspecialchars(strip_tags($this->eatdb2));
            $this->eatwb2=htmlspecialchars(strip_tags($this->eatwb2));
            $this->eft3=htmlspecialchars(strip_tags($this->eft3));
            $this->approxbtuh=htmlspecialchars(strip_tags($this->approxbtuh));
            $this->tonnage=htmlspecialchars(strip_tags($this->tonnage));
            $this->voltage=htmlspecialchars(strip_tags($this->voltage));

            $stmt = $this->conn->prepare($query);
           
            $stmt->bindParam(":scfmret", $this->scfmret);
            $stmt->bindParam(":scfmout", $this->scfmout);
            $stmt->bindParam(":esp", $this->esp);
            $stmt->bindParam(":eatdb1ret", $this->eatdb1ret);
            $stmt->bindParam(":eatdb1mix", $this->eatdb1mix);
            $stmt->bindParam(":eatwb1ret", $this->eatwb1ret);
            $stmt->bindParam(":eatwb1mix", $this->eatwb1mix);
            $stmt->bindParam(":gpm1", $this->gpm1);
            $stmt->bindParam(":eft1", $this->eft1);
            $stmt->bindParam(":evapfiltertype", $this->evapfiltertype);
            $stmt->bindParam(":heattype", $this->heattype);
            $stmt->bindParam(":reheattype", $this->reheattype);
            $stmt->bindParam(":airsideecon", $this->airsideecon);
            $stmt->bindParam(":eatf", $this->eatf);
            $stmt->bindParam(":approxlat", $this->approxlat);
            $stmt->bindParam(":eft2", $this->eft2);
            $stmt->bindParam(":lftgpm", $this->lftgpm);
            $stmt->bindParam(":eatdb2", $this->eatdb2);
            $stmt->bindParam(":eatwb2", $this->eatwb2);
            $stmt->bindParam(":eft3", $this->eft3);
            $stmt->bindParam(":approxbtuh", $this->approxbtuh);
            $stmt->bindParam(":tonnage", $this->tonnage);
            $stmt->bindParam(":voltage", $this->voltage);
            // execute query
            if($stmt->execute()){
                return true;
            }
            return false;   
        }
    }
?>