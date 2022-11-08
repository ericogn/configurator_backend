<?php

class Page5{
    private $conn;
    private $table = "projectsaver";

    public $details;

    public $vavapptype;
    public $walltempsens;
    public $wallhumidsens;
    public $ducttempsens;
    public $ducthumidsens;
    public $bmscomm;
    public $marveldisplay;
    public $scr;
    public $smokedetector;
    public $firestat;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function update(){
        $qry="UPDATE ".$this->table."
        SET
        vavapptype =:vavapptype,
        walltempsens =:walltempsens,
        wallhumidsens =:wallhumidsens,
        ducttempsens =:ducttempsens,
        ducthumidsens =:ducthumidsens,
        bmscomm =:bmscomm,
        marveldisplay =:marveldisplay,
        scr =:scr,
        smokedetector =:smokedetector,
        firestat =:firestat
        WHERE details = ".$this->details."";

        $this->vavapptype=htmlspecialchars(strip_tags($this->vavapptype));
        $this->walltempsens=htmlspecialchars(strip_tags($this->walltempsens));
        $this->wallhumidsens=htmlspecialchars(strip_tags($this->wallhumidsens));
        $this->ducttempsens=htmlspecialchars(strip_tags($this->ducttempsens));
        $this->ducthumidsens=htmlspecialchars(strip_tags($this->ducthumidsens));
        $this->bmscomm=htmlspecialchars(strip_tags($this->bmscomm));
        $this->marveldisplay=htmlspecialchars(strip_tags($this->marveldisplay));
        $this->scr=htmlspecialchars(strip_tags($this->scr));
        $this->smokedetector=htmlspecialchars(strip_tags($this->smokedetector));
        $this->firestat=htmlspecialchars(strip_tags($this->firestat));
        
        
        $statement = $this->conn->prepare($qry);
        
        $statement->bindParam(":vavapptype",$this->vavapptype);
        $statement->bindParam(":walltempsens",$this->walltempsens);
        $statement->bindParam(":wallhumidsens",$this->wallhumidsens);
        $statement->bindParam(":ducttempsens",$this->ducttempsens);
        $statement->bindParam(":ducthumidsens",$this->ducthumidsens);
        $statement->bindParam(":bmscomm",$this->bmscomm);
        $statement->bindParam(":marveldisplay",$this->marveldisplay);
        $statement->bindParam(":scr",$this->scr);
        $statement->bindParam(":smokedetector",$this->smokedetector);
        $statement->bindParam(":firestat",$this->firestat);

        if($statement->execute()){
            return true;
        }return false;
    }

    public function getValuesOnPage5(){
        $qry = "SELECT vavapptype, walltempsens, wallhumidsens,
        ducttempsens, ducthumidsens, bmscomm, marveldisplay, scr,
        smokedetector, firestat
        FROM ".$this->table."
        WHERE details = ".$this->details."";

        $statement = $this->conn->prepare($qry);
        $statement->execute();
        return $statement;
    }


}

?>