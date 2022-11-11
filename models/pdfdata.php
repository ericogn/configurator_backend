<?php
    class PercentGlycol{
        private $conn;
        private $table = "pdfdata";

        public $tonnage;
        public $voltage;
        public $mass;
        public $totalcfm;
        public $mincfm;
        public $evaporator;
        public $eatwbdb;
        public $latwbdb;
        public $totalbtuh;
        public $eer;
        public $condflow;
        public $pressuredrop;
        public $eft;
        public $lft;
        public $evapmaterials;
        public $evaprows;
        public $evapfacearea;
        public $evapfacevel;
        public $condtype;
        public $evapblowerqty;
        public $evapblowerrpm;
        public $blowerkw;
        public $heatnominal;
        public $heatuse;
        public $heatamps;
        public $mincirccapac;
        public $maxoverprotection;
        public $compressorqty;
        public $digitalscrollcomp;
        public $stdscrollcomp;
        public $pdfdimension;
        public $quotationterms;
       

        public function __construct($db) {
            $this->conn = $db;
        }

        public function getOneLine($tonnage, $voltage){
            $query = "SELECT * FROM `pdfdata` 
            WHERE (tonnage = ".$tonnage." AND voltage = ".$voltage.")";

            //prepare statement
            $statement = $this->conn->prepare($query);
            $statement->execute();
    
            return $statement;
        }

        public function modify(){
            $query = "UPDATE `pdfdata`
            SET
            mass =:mass,
            totalcfm =:totalcfm,
            mincfm =:mincfm,
            evaporator =:evaporator,
            eatwbdb =:eatwbdb,
            latwbdb =:latwbdb,
            totalbtuh =:totalbtuh,
            eer =:eer,
            condflow =:condflow,
            pressuredrop =:pressuredrop,
            eft =:eft,
            lft =:lft,
            evapmaterials =:evapmaterials,
            evaprows =:evaprows,
            evapfacearea =:evapfacearea,
            evapfacevel =:evapfacevel,
            condtype =:condtype,
            evapblowerqty =:evapblowerqty,
            evapblowerrpm =:evapblowerrpm,
            blowerkw =:blowerkw,
            heatnominal =:heatnominal,
            heatuse =:heatuse,
            heatamps =:heatamps,
            mincirccapac =:mincirccapac,
            maxoverprotection =:maxoverprotection,
            compressorqty =:compressorqty,
            digitalscrollcomp =:digitalscrollcomp,
            stdscrollcomp =:stdscrollcomp,
            pdfdimension =:pdfdimension,
            quotationterms =:quotationterms
            WHERE (tonnage =:tonnage AND voltage =:voltage)
            ";

            
            $this->totalcfm=htmlspecialchars(strip_tags($this->totalcfm));
            $this->mincfm=htmlspecialchars(strip_tags($this->mincfm));
            $this->evaporator=htmlspecialchars(strip_tags($this->evaporator));
            $this->eatwbdb=htmlspecialchars(strip_tags($this->eatwbdb));
            $this->latwbdb=htmlspecialchars(strip_tags($this->latwbdb));
            $this->totalbtuh=htmlspecialchars(strip_tags($this->totalbtuh));
            $this->eer=htmlspecialchars(strip_tags($this->eer));
            $this->condflow=htmlspecialchars(strip_tags($this->condflow));
            $this->pressuredrop=htmlspecialchars(strip_tags($this->pressuredrop));
            $this->eft=htmlspecialchars(strip_tags($this->eft));
            $this->lft=htmlspecialchars(strip_tags($this->lft));
            $this->evapmaterials=htmlspecialchars(strip_tags($this->evapmaterials));
            $this->evaprows=htmlspecialchars(strip_tags($this->evaprows));
            $this->evapfacearea=htmlspecialchars(strip_tags($this->evapfacearea));
            $this->evapfacevel=htmlspecialchars(strip_tags($this->evapfacevel));
            $this->condtype=htmlspecialchars(strip_tags($this->condtype));
            $this->evapblowerqty=htmlspecialchars(strip_tags($this->evapblowerqty));
            $this->evapblowerrpm=htmlspecialchars(strip_tags($this->evapblowerrpm));
            $this->blowerkw=htmlspecialchars(strip_tags($this->blowerkw));
            $this->heatnominal=htmlspecialchars(strip_tags($this->heatnominal));
            $this->heatuse=htmlspecialchars(strip_tags($this->heatuse));
            $this->heatamps=htmlspecialchars(strip_tags($this->heatamps));
            $this->mincirccapac=htmlspecialchars(strip_tags($this->mincirccapac));
            $this->maxoverprotection=htmlspecialchars(strip_tags($this->maxoverprotection));
            $this->compressorqty=htmlspecialchars(strip_tags($this->compressorqty));
            $this->digitalscrollcomp=htmlspecialchars(strip_tags($this->digitalscrollcomp));
            $this->stdscrollcomp=htmlspecialchars(strip_tags($this->stdscrollcomp));
            $this->pdfdimension=htmlspecialchars(strip_tags($this->pdfdimension));
            $this->quotationterms=htmlspecialchars(strip_tags($this->quotationterms));
            $this->tonnage=htmlspecialchars(strip_tags($this->tonnage));
            $this->voltage=htmlspecialchars(strip_tags($this->voltage));

            $statement = $this->conn->prepare($query);

            $statement->bindParam(":tonnage", $this->tonnage);
            $statement->bindParam(":voltage", $this->voltage);
            $statement->bindParam(":mass", $this->mass);
            $statement->bindParam(":totalcfm", $this->totalcfm);
            $statement->bindParam(":mincfm", $this->mincfm);
            $statement->bindParam(":evaporator", $this->evaporator);
            $statement->bindParam(":eatwbdb", $this->eatwbdb);
            $statement->bindParam(":latwbdb", $this->latwbdb);
            $statement->bindParam(":totalbtuh", $this->totalbtuh);
            $statement->bindParam(":eer", $this->eer);
            $statement->bindParam(":condflow", $this->condflow);
            $statement->bindParam(":pressuredrop", $this->pressuredrop);
            $statement->bindParam(":eft", $this->eft);
            $statement->bindParam(":lft", $this->lft);
            $statement->bindParam(":evapmaterials", $this->evapmaterials);
            $statement->bindParam(":evaprows", $this->evaprows);
            $statement->bindParam(":evapfacearea", $this->evapfacearea);
            $statement->bindParam(":evapfacevel", $this->evapfacevel);
            $statement->bindParam(":condtype", $this->condtype);
            $statement->bindParam(":evapblowerqty", $this->evapblowerqty);
            $statement->bindParam(":evapblowerrpm", $this->evapblowerrpm);
            $statement->bindParam(":blowerkw", $this->blowerkw);
            $statement->bindParam(":heatnominal", $this->heatnominal);
            $statement->bindParam(":heatuse", $this->heatuse);
            $statement->bindParam(":heatamps", $this->heatamps);
            $statement->bindParam(":mincirccapac", $this->mincirccapac);
            $statement->bindParam(":maxoverprotection", $this->maxoverprotection);
            $statement->bindParam(":compressorqty", $this->compressorqty);
            $statement->bindParam(":digitalscrollcomp", $this->digitalscrollcomp);
            $statement->bindParam(":stdscrollcomp", $this->stdscrollcomp);
            $statement->bindParam(":pdfdimension", $this->pdfdimension);
            $statement->bindParam(":quotationterms", $this->quotationterms);
            $statement->bindParam(":tonnage", $this->tonnage);
            $statement->bindParam(":voltage", $this->voltage);

            if ($statement->execute()){
                return true;
            }return false;

        }
    }
?>