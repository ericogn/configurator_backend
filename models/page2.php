<?php

class Page2{

    private $conn;
    private $table = "projectsaver";

    

    public $details;
    public $scfmret;
    public $espret;
    public $eatdbret;
    public $eatwbret;

    public $scfmout;
    public $espout;
    public $eatdbout;
    public $eatwbout;

    public $scfmmix;
    public $espmix;
    public $eatdbmix;
    public $eatwbmix;

    public $mixedair;
    public $fluidtype;
    public $percentglycol;
    public $gmpp;
    public $eft;
    public $evapfiltertype;
    public $heattype;
    public $reheattype;
    public $airsideecon;
    public $electrictemprise;
    public $chilledwatercoil;
    public $watersideecon;
    public $heatnreheat;
    public $eatf;
    public $approxlat;
    public $eft2;
    public $percentglycol2;
    public $fluidtype2;
    public $lftgpm;
    public $lftgpmvalue;
    public $eatdb2;
    public $eatwb2;
    public $eft3;
    public $approxbtuh;
    public $lastmodified;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function update(){

        $qry = "UPDATE ".$this->table." 
        SET 
        scfmret =:scfmret,
        espret =:espret,
        eatdbret =:eatdbret,
        eatwbret =:eatwbret,

        scfmout =:scfmout,
        espout =:espout,
        eatdbout =:eatdbout,
        eatwbout =:eatwbout,

        scfmmix =:scfmmix,
        espmix =:espmix,
        eatdbmix =:eatdbmix,
        eatwbmix =:eatwbmix,
        
        mixedair =:mixedair,
        fluidtype =:fluidtype,
        percentglycol =:percentglycol,
        gpm =:gpm,
        eft =:eft,
        evapfiltertype =:evapfiltertype,
        heattype =:heattype,
        reheattype =:reheattype,
        airsideecon =:airsideecon,
        electrictemprise =:electrictemprise,
        chilledwatercoil =:chilledwatercoil,
        watersideecon =:watersideecon,
        heatnreheat =:heatnreheat,
        eatf =:eatf,
        approxlat =:approxlat,
        eft2 =:eft2,
        percentglycol2 =:percentglycol2,
        fluidtype2 =:fluidtype2,
        lftgpm =:lftgpm,
        lftgpmvalue =:lftgpmvalue,
        eatdb2 =:eatdb2,
        eatwb2 =:eatwb2,
        eft3 =:eft3,
        approxbtuh =:approxbtuh
        where details = ".$this->details."";

        $this->scfmret=htmlspecialchars(strip_tags($this->scfmret));
        $this->espret=htmlspecialchars(strip_tags($this->espret));
        $this->eatdbret=htmlspecialchars(strip_tags($this->eatdbret));
        $this->eatwbret=htmlspecialchars(strip_tags($this->eatwbret));

        $this->scfmout=htmlspecialchars(strip_tags($this->scfmout));
        $this->espout=htmlspecialchars(strip_tags($this->espout));
        $this->eatdbout=htmlspecialchars(strip_tags($this->eatdbout));
        $this->eatwbout=htmlspecialchars(strip_tags($this->eatwbout));

        $this->scfmmix=htmlspecialchars(strip_tags($this->scfmmix));
        $this->espmix=htmlspecialchars(strip_tags($this->espmix));
        $this->eatdbmix=htmlspecialchars(strip_tags($this->eatdbmix));
        $this->eatwbmix=htmlspecialchars(strip_tags($this->eatwbmix));

        $this->mixedair=htmlspecialchars(strip_tags($this->mixedair));
        $this->fluidtype=htmlspecialchars(strip_tags($this->fluidtype));
        $this->percentglycol=htmlspecialchars(strip_tags($this->percentglycol));
        $this->gmp=htmlspecialchars(strip_tags($this->gpm));
        $this->eft=htmlspecialchars(strip_tags($this->eft));
        $this->evapfiltertype=htmlspecialchars(strip_tags($this->evapfiltertype));
        $this->heattype=htmlspecialchars(strip_tags($this->heattype));
        $this->reheattype=htmlspecialchars(strip_tags($this->reheattype));
        $this->airsideecon=htmlspecialchars(strip_tags($this->airsideecon));
        $this->electrictemprise=htmlspecialchars(strip_tags($this->electrictemprise));
        $this->chilledwatercoil=htmlspecialchars(strip_tags($this->chilledwatercoil));
        $this->watersideecon=htmlspecialchars(strip_tags($this->watersideecon));
        $this->heatnreheat=htmlspecialchars(strip_tags($this->heatnreheat));
        $this->eatf=htmlspecialchars(strip_tags($this->eatf));
        $this->approxlat=htmlspecialchars(strip_tags($this->approxlat));
        $this->eft2=htmlspecialchars(strip_tags($this->eft2));
        $this->percentglycol2=htmlspecialchars(strip_tags($this->percentglycol2));
        $this->fluidtype2=htmlspecialchars(strip_tags($this->fluidtype2));
        $this->lftgpm=htmlspecialchars(strip_tags($this->lftgpm));
        $this->lftgpmvalue=htmlspecialchars(strip_tags($this->lftgpmvalue));
        $this->eatdb2=htmlspecialchars(strip_tags($this->eatdb2));
        $this->eatwb2=htmlspecialchars(strip_tags($this->eatwb2));
        $this->eft3=htmlspecialchars(strip_tags($this->eft3));
        $this->approxbtuh=htmlspecialchars(strip_tags($this->approxbtuh));
        // $this->lastmodified=htmlspecialchars(strip_tags($this->lastmodified));
        $statement = $this->conn->prepare($qry);
        
        $statement->bindParam(":scfmret",$this->scfmret);
        $statement->bindParam(":espret",$this->espret);
        $statement->bindParam(":eatdbret",$this->eatdbret);
        $statement->bindParam(":eatwbret",$this->eatwbret);

        $statement->bindParam(":scfmout",$this->scfmout);
        $statement->bindParam(":espout",$this->espout);
        $statement->bindParam(":eatdbout",$this->eatdbout);
        $statement->bindParam(":eatwbout",$this->eatwbout);

        $statement->bindParam(":scfmmix",$this->scfmmix);
        $statement->bindParam(":espmix",$this->espmix);
        $statement->bindParam(":eatdbmix",$this->eatdbmix);
        $statement->bindParam(":eatwbmix",$this->eatwbmix);


        $statement->bindParam(":mixedair",$this->mixedair);
        $statement->bindParam(":fluidtype",$this->fluidtype);
        $statement->bindParam(":percentglycol",$this->percentglycol);
        $statement->bindParam(":gpm",$this->gpm);
        $statement->bindParam(":eft",$this->eft);
        $statement->bindParam(":evapfiltertype",$this->evapfiltertype);
        $statement->bindParam(":heattype",$this->heattype);
        $statement->bindParam(":reheattype",$this->reheattype);
        $statement->bindParam(":airsideecon",$this->airsideecon);
        $statement->bindParam(":electrictemprise",$this->electrictemprise);
        $statement->bindParam(":chilledwatercoil",$this->chilledwatercoil);
        $statement->bindParam(":watersideecon",$this->watersideecon);
        $statement->bindParam(":heatnreheat",$this->heatnreheat);
        $statement->bindParam(":eatf",$this->eatf);
        $statement->bindParam(":approxlat",$this->approxlat);
        $statement->bindParam(":eft2",$this->eft2);
        $statement->bindParam(":percentglycol2",$this->percentglycol2);
        $statement->bindParam(":fluidtype2",$this->fluidtype2);
        $statement->bindParam(":lftgpm",$this->lftgpm);
        $statement->bindParam(":lftgpmvalue",$this->lftgpmvalue);
        $statement->bindParam(":eatdb2",$this->eatdb2);
        $statement->bindParam(":eatwb2",$this->eatwb2);
        $statement->bindParam(":eft3",$this->eft3);
        $statement->bindParam(":approxbtuh",$this->approxbtuh);
        //$statement->bindParam(":lastmodified",date('Y-m-d'));

        if($statement->execute()){
            return true;
        }return false;
    }  
    
    public function getValuesOnPage2(){
        $qry = "SELECT 
        scfmret,
        espret,
        eatdbret,
        eatwbret, 

        scfmout ,
        espout, 
        eatdbout,
        eatwbout,

        scfmmix,
        espmix,
        eatdbmix,
        eatwbmix,
        
        mixedair ,
        fluidtype,
        percentglycol,
        gpm,
        eft,
        evapfiltertype,
        heattype,
        reheattype,
        airsideecon,
        electrictemprise,
        chilledwatercoil,
        watersideecon,
        heatnreheat,
        eatf,
        approxlat,
        eft2 ,
        percentglycol2,
        fluidtype2 ,
        lftgpm ,
        lftgpmvalue,
        eatdb2 ,
        eatwb2 ,
        eft3 ,
        approxbtuh
        FROM ".$this->table."
        WHERE details = ".$this->details."";

        $statement = $this->conn->prepare($qry);
        $statement->execute();
        return $statement;
    }
}

?>