<?php

class Page1{

    private $conn;
    private $table = "projectsaver";

    

    public $details;
    public $email;
    public $quantity;
    public $unittag;
    public $basemodel;
    public $producttype;
    public $tonnage;
    public $voltage;
    public $module;
    public $blowertype;
    public $evapairpath;
    public $digitalscrollcomp;
    public $tonparam;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function update(){

        $qry = "UPDATE projectsaver 
        SET 
        quantity =:quantity, 
        unittag=:unittag,
        basemodel=:basemodel,
        producttype=:producttype,
        tonnage=:tonnage,
        voltage=:voltage,
        module=:module,
        blowertype=:blowertype,
        evapairpath=:evapairpath,
        digitalscrollcomp=:digitalscrollcomp 
        where details = ".$this->details."";

        $this->quantity=htmlspecialchars(strip_tags($this->quantity));
        $this->unittag=htmlspecialchars(strip_tags($this->unittag));
        $this->basemodel=htmlspecialchars(strip_tags($this->basemodel));
        $this->producttype=htmlspecialchars(strip_tags($this->producttype));
        $this->tonnage=htmlspecialchars(strip_tags($this->tonnage));
        $this->voltage=htmlspecialchars(strip_tags($this->voltage));
        $this->module=htmlspecialchars(strip_tags($this->module));
        $this->blowertype=htmlspecialchars(strip_tags($this->blowertype));
        $this->evapairpath=htmlspecialchars(strip_tags($this->evapairpath));
        $this->digitalscrollcomp=htmlspecialchars(strip_tags($this->digitalscrollcomp));
        
        $statement = $this->conn->prepare($qry);
        
        $statement->bindParam(":quantity",$this->quantity);
        $statement->bindParam(":unittag",$this->unittag);
        $statement->bindParam(":basemodel",$this->basemodel);
        $statement->bindParam(":producttype",$this->producttype);
        $statement->bindParam(":tonnage",$this->tonnage);
        $statement->bindParam(":voltage",$this->voltage);
        $statement->bindParam(":module",$this->module);
        $statement->bindParam(":blowertype",$this->blowertype);
        $statement->bindParam(":evapairpath",$this->evapairpath);
        $statement->bindParam(":digitalscrollcomp",$this->digitalscrollcomp);

        if($statement->execute()){
            return true;
        } else return false;

        
    } 

    // public function updatefields(){
    //     $qry2 = "UPDATE `projectsaver`
    //     set `scfmret` = IF(tonnage = '30',14000, 0)
    //     where details = ".$this->details.";";
    //     $qry3 = "UPDATE `projectsaver`
    //     set `scfmout` = IF(tonnage = '30',0, 0)
    //     where details = ".$this->details.";";
    //     $qry4="UPDATE `projectsaver`
    //     set `scfmmix` = IF(tonnage = '30',0, 0)
    //     where details = ".$this->details.";";
    //     $qry5="UPDATE `projectsaver`
    //     set `eatdbret` = IF(tonnage = '30',80, 0)
    //     where details = ".$this->details.";";
    //     $qry6="UPDATE `projectsaver`
    //     set `eatdbout` = IF(tonnage = '30',100,0)
    //     where details = ".$this->details.";";
    //     $qry6="UPDATE `projectsaver`
    //     set `eatdbmix` = IF(tonnage = '30',81.8, 0)
    //     where details = ".$this->details.";";
    //     $qry7="UPDATE `projectsaver`
    //     set `eatwbret` = IF(tonnage = '30',67, 0)
    //     where details = ".$this->details.";";
    //     $qry8="UPDATE `projectsaver`
    //     set `eatwbout` = IF(tonnage = '30',78, 0)
    //     where details = ".$this->details.";";
    //     $qry9 = "UPDATE `projectsaver`
    //     set `eatwbmix` = IF(tonnage = '30',68, 0)
    //     where details = ".$this->details.";";
    //     $qry10="UPDATE `projectsaver`
    //     set `eatf` = IF(tonnage = '30',60, 0)
    //     where details = ".$this->details.";";
    //     $qry11="UPDATE `projectsaver`
    //     set `eft` = IF(tonnage = '30',180, 0)
    //     where details = ".$this->details.";";
    //     $qry12="UPDATE `projectsaver`
    //     set `espret` = IF(tonnage = '30',1, 0)
    //     where details = ".$this->details.";";
    //     $qry13="UPDATE `projectsaver`
    //     set `eft3` = IF(tonnage = '30',0, 0)
    //     where details = ".$this->details.";";

    //     $statement2 = $this->conn->prepare($qry2);
    //     $statement3 = $this->conn->prepare($qry3);
    //     $statement4 = $this->conn->prepare($qry4);
    //     $statement5 = $this->conn->prepare($qry5);
    //     $statement6 = $this->conn->prepare($qry6);
    //     $statement7 = $this->conn->prepare($qry7);
    //     $statement8 = $this->conn->prepare($qry8);
    //     $statement9 = $this->conn->prepare($qry9);
    //     $statement10 = $this->conn->prepare($qry10);
    //     $statement11 = $this->conn->prepare($qry11);
    //     $statement12 = $this->conn->prepare($qry12);
    //     $statement13 = $this->conn->prepare($qry13);

    //     if($statement2->execute() && 
    //        $statement3->execute() &&
    //        $statement4->execute() && 
    //        $statement5->execute() &&
    //        $statement6->execute() && 
    //        $statement7->execute() &&
    //        $statement8->execute() && 
    //        $statement9->execute() &&
    //        $statement10->execute() && 
    //        $statement11->execute() &&
    //        $statement12->execute() && 
    //        $statement13->execute()){
    //         return true;
    //     }return false;
    // }
    
    
    public function getValuesOnPage1(){
        $qry = "SELECT quantity, unittag, basemodel, producttype, tonnage, voltage, module, blowertype, evapairpath, digitalscrollcomp
        FROM ".$this->table."
        WHERE details = ".$this->details."";
        
        $statement = $this->conn->prepare($qry);
        if($statement->execute()){
            return $statement;
        }return false;
    }
}

?>