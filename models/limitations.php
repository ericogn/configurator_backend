<?php

class Limitations{

    private $conn;
    private $table = "limitations";


    public $scfmretmin;
    public $scfmretmax;
    public $scfmoutmin;
    public $scfmoutmax;
    public $espmin;
    public $espmax;
    public $eatdb1retmin;
    public $eatdb1retmax;
    public $eatdb1outmin;
    public $eatdb1outmax;
    public $eatwb1retmin;
    public $eatwb1retmax;
    public $eatwb1outmin;
    public $eatwb1outmax;
    public $gpmmin;
    public $gpmmax;
    public $eft1min;
    public $eft1max;
    public $eatfmin;
    public $eatfmax;
    public $approxlatmin;
    public $approxlatmax;
    public $eft2min;
    public $eft2max;
    public $lftgpmmin;
    public $lftgpmmax;
    public $eatdb2min;
    public $eatdb2max;
    public $eatwb2min;
    public $eatwb2max;
    public $eft3min;
    public $eft3max;
    public $btuhmin;
    public $btuhmax;
    public $tonnage;
    public $voltage;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getOneLine(){
        $query = "SELECT * FROM `limitations` 
        WHERE (tonnage =:tonnage AND voltage =:voltage)";

        //prepare statement
        $this->tonnage=htmlspecialchars(strip_tags($this->tonnage));
        $this->voltage=htmlspecialchars(strip_tags($this->voltage));

        $statement = $this->conn->prepare($query);

        $statement->bindParam(":tonnage", $this->tonnage);
        $statement->bindParam(":voltage", $this->voltage);

        $statement->execute();

        return $statement;
    }

    public function updateLine(){
        $query = "UPDATE `limitations`
        SET
        scfmretmin =:scfmretmin,
        scfmretmax =:scfmretmax,
        scfmoutmin =:scfmoutmin,
		scfmoutmax =:scfmoutmax,
		espmin =:espmin,
		espmax =:espmax,
		eatdb1retmin =:eatdb1retmin,
		eatdb1retmax =:eatdb1retmax,
		eatdb1outmin =:eatdb1outmin,
		eatdb1outmax =:eatdb1outmax,
		eatwb1retmin =:eatwb1retmin,
		eatwb1retmax =:eatwb1retmax,
		eatwb1outmin =:eatwb1outmin,
		eatwb1outmax =:eatwb1outmax,
		gpmmin =:gpmmin,
		gpmmax =:gpmmax,
		eft1min =:eft1min,
		eft1max	=:eft1max,
		eatfmin	=:eatfmin,
		eatfmax	=:eatfmax,
		approxlatmin =:approxlatmin,
		approxlatmax =:approxlatmax,
		eft2min	=:eft2min,
		eft2max	=:eft2max,
		lftgpmmin =:lftgpmmin,
		lftgpmmax =:lftgpmmax,
		eatdb2min =:eatdb2min,
		eatdb2max =:eatdb2max,	
		eatwb2min =:eatwb2min,
		eatwb2max =:eatwb2max,
		eft3min	=:eft3min,
		eft3max	=:eft3max,
		btuhmin	=:btuhmin,
		btuhmax =:btuhmax
        WHERE (tonnage =:tonnage AND voltage =:voltage)
        ";

        $this->scfmretmin=htmlspecialchars(strip_tags($this->scfmretmin));
        $this->scfmretmax=htmlspecialchars(strip_tags($this->scfmretmax));
        $this->scfmoutmin=htmlspecialchars(strip_tags($this->scfmoutmin));
        $this->scfmoutmax=htmlspecialchars(strip_tags($this->scfmoutmax));
        $this->espmin=htmlspecialchars(strip_tags($this->espmin));
        $this->espmax=htmlspecialchars(strip_tags($this->espmax));
        $this->eatdb1retmin=htmlspecialchars(strip_tags($this->eatdb1retmin));
        $this->eatdb1retmax=htmlspecialchars(strip_tags($this->eatdb1retmax));
        $this->eatdb1outmin=htmlspecialchars(strip_tags($this->eatdb1outmin));
        $this->eatdb1outmax=htmlspecialchars(strip_tags($this->eatdb1outmax));

        $this->eatwb1retmin=htmlspecialchars(strip_tags($this->eatwb1retmin));
        $this->eatwb1retmax=htmlspecialchars(strip_tags($this->eatwb1retmax));
        $this->eatwb1outmin=htmlspecialchars(strip_tags($this->eatwb1outmin));
        $this->eatwb1outmax=htmlspecialchars(strip_tags($this->eatwb1outmax));
        $this->gpmmin=htmlspecialchars(strip_tags($this->gpmmin));
        $this->gpmmax=htmlspecialchars(strip_tags($this->gpmmax));
        $this->eft1min=htmlspecialchars(strip_tags($this->eft1min));
        $this->eft1max=htmlspecialchars(strip_tags($this->eft1max));
        $this->eatfmin=htmlspecialchars(strip_tags($this->eatfmin));
        $this->eatfmax=htmlspecialchars(strip_tags($this->eatfmax));

        $this->approxlatmin=htmlspecialchars(strip_tags($this->approxlatmin));
        $this->approxlatmax=htmlspecialchars(strip_tags($this->approxlatmax));
        $this->eft2min=htmlspecialchars(strip_tags($this->eft2min));
        $this->eft2max=htmlspecialchars(strip_tags($this->eft2max));
        $this->lftgpmmin=htmlspecialchars(strip_tags($this->lftgpmmin));
        $this->lftgpmmax=htmlspecialchars(strip_tags($this->lftgpmmax));
        $this->eatdb2min=htmlspecialchars(strip_tags($this->eatdb2min));
        $this->eatdb2max=htmlspecialchars(strip_tags($this->eatdb2max));
        $this->eatwb2min=htmlspecialchars(strip_tags($this->eatwb2min));
        $this->eatwb2max=htmlspecialchars(strip_tags($this->eatwb2max));

        $this->eft3min=htmlspecialchars(strip_tags($this->eft3min));
        $this->eft3max=htmlspecialchars(strip_tags($this->eft3max));
        $this->btuhmin=htmlspecialchars(strip_tags($this->btuhmin));
        $this->btuhmax=htmlspecialchars(strip_tags($this->btuhmax));
        $this->tonnage=htmlspecialchars(strip_tags($this->tonnage));
        $this->voltage=htmlspecialchars(strip_tags($this->voltage));

        $statement = $this->conn->prepare($query);

        $statement->bindParam(":scfmretmin", $this->scfmretmin);
        $statement->bindParam(":scfmretmax", $this->scfmretmax);
        $statement->bindParam(":scfmoutmin", $this->scfmoutmin);
        $statement->bindParam(":scfmoutmax", $this->scfmoutmax);
        $statement->bindParam(":espmin", $this->espmin);
        $statement->bindParam(":espmax", $this->espmax);
        $statement->bindParam(":eatdb1retmin", $this->eatdb1retmin);
        $statement->bindParam(":eatdb1retmax", $this->eatdb1retmax);
        $statement->bindParam(":eatdb1outmin", $this->eatdb1outmin);
        $statement->bindParam(":eatdb1outmax", $this->eatdb1outmax);
        
        $statement->bindParam(":eatwb1retmin", $this->eatwb1retmin);
        $statement->bindParam(":eatwb1retmax", $this->eatwb1retmax);
        $statement->bindParam(":eatwb1outmin", $this->eatwb1outmin);
        $statement->bindParam(":eatwb1outmax", $this->eatwb1outmax);
        $statement->bindParam(":gpmmin", $this->gpmmin);
        $statement->bindParam(":gpmmax", $this->gpmmax);
        $statement->bindParam(":eft1min", $this->eft1min);
        $statement->bindParam(":eft1max", $this->eft1max);
        $statement->bindParam(":eatfmin", $this->eatfmin);
        $statement->bindParam(":eatfmax", $this->eatfmax);

        $statement->bindParam(":approxlatmin", $this->approxlatmin);
        $statement->bindParam(":approxlatmax", $this->approxlatmax);
        $statement->bindParam(":eft2min", $this->eft2min);
        $statement->bindParam(":eft2max", $this->eft2max);
        $statement->bindParam(":lftgpmmin", $this->lftgpmmin);
        $statement->bindParam(":lftgpmmax", $this->lftgpmmax);
        $statement->bindParam(":eatdb2min", $this->eatdb2min);
        $statement->bindParam(":eatdb2max", $this->eatdb2max);
        $statement->bindParam(":eatwb2min", $this->eatwb2min);
        $statement->bindParam(":eatwb2max", $this->eatwb2max);

        $statement->bindParam(":eft3min", $this->eft3min);
        $statement->bindParam(":eft3max", $this->eft3max);
        $statement->bindParam(":btuhmin", $this->btuhmin);
        $statement->bindParam(":btuhmax", $this->btuhmax);
        $statement->bindParam(":tonnage", $this->tonnage);
        $statement->bindParam(":voltage", $this->voltage);

        if ($statement->execute()){
            return true;
        }return false;
    }

    public  function readall(){
        $query = "SELECT * FROM `limitations`";

        //prepare statement
        $statement = $this->conn->prepare($query);
        $statement->execute();

        return $statement;
    }

}

?>