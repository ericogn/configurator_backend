<?php

class Page4{
    private $conn;
    private $table = "projectsaver";

    public $details;
    public $nonfused;
    public $phasereversalsens;
    public $freezestat;
    public $tempavg;
    public $condesnatepump;
    public $compressorheater;
    public $remotewaterpump;
    public $waterflowswitch;
    public $contactsqty;
    public $usedfor;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function update(){
        $qry = "UPDATE ".$this->table."
        SET
        nonfused =:nonfused,
        phasereversalsens =:phasereversalsens,
        freezestat =:freezestat,
        tempavg =:tempavg,
        condesnatepump =:condesnatepump,
        compressorheater =:compressorheater,
        remotewaterpump =:remotewaterpump,
        waterflowswitch =:waterflowswitch,
        contactsqty =:contactsqty,
        usedfor =:usedfor
        WHERE details = ".$this->details."";


        $this->nonfused=htmlspecialchars(strip_tags($this->nonfused));
        $this->phasereversalsens=htmlspecialchars(strip_tags($this->phasereversalsens));
        $this->freezestat=htmlspecialchars(strip_tags($this->freezestat));
        $this->tempavg=htmlspecialchars(strip_tags($this->tempavg));
        $this->condesnatepump=htmlspecialchars(strip_tags($this->condesnatepump));
        $this->compressorheater=htmlspecialchars(strip_tags($this->compressorheater));
        $this->remotewaterpump=htmlspecialchars(strip_tags($this->remotewaterpump));
        $this->waterflowswitch=htmlspecialchars(strip_tags($this->waterflowswitch));
        $this->contactsqty=htmlspecialchars(strip_tags($this->contactsqty));
        $this->usedfor=htmlspecialchars(strip_tags($this->usedfor));

        $statement = $this->conn->prepare($qry);

        $statement->bindParam(":nonfused",$this->nonfused);
        $statement->bindParam(":phasereversalsens",$this->phasereversalsens);
        $statement->bindParam(":freezestat",$this->freezestat);
        $statement->bindParam(":tempavg",$this->tempavg);
        $statement->bindParam(":condesnatepump",$this->condesnatepump);
        $statement->bindParam(":compressorheater",$this->compressorheater);
        $statement->bindParam(":remotewaterpump",$this->remotewaterpump);
        $statement->bindParam(":waterflowswitch",$this->waterflowswitch);
        $statement->bindParam(":contactsqty",$this->contactsqty);
        $statement->bindParam(":usedfor",$this->usedfor);

        if($statement->execute()){
            return true;
        }return false;
    }

    public function getValuesOnPage4(){
        $qry = "SELECT nonfused, phasereversalsens, freezestat, tempavg,
        condesnatepump, compressorheater, remotewaterpump, 
        waterflowswitch, contactsqty, usedfor
        FROM ".$this->table."
        WHERE details = ".$this->details."";

        $statement = $this->conn->prepare($qry);
        $statement->execute();
        return $statement;
    }
}


?>
