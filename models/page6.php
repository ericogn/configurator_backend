<?php


class Page6{
    private $conn;
    private $table = "projectsaver";

    public $details;

    public $shipsplit;
    public $compressoracoustic;
    public $protectivecoil;
    public $unitinsul;
    public $nonstandard;
    public $totalcost;


    public function __construct($db) {
        $this->conn = $db;
    }

    public function update(){
        $qry ="UPDATE ".$this->table."
        SET 
        shipsplit =:shipsplit,
        compressoracoustic =:compressoracoustic,
        protectivecoil =:protectivecoil,
        unitinsul =:unitinsul,
        nonstandard =:nonstandard,
        totalcost =:totalcost
        WHERE details = ".$this->details."";

        $this->shipsplit=htmlspecialchars(strip_tags($this->shipsplit));
        $this->compressoracoustic=htmlspecialchars(strip_tags($this->compressoracoustic));
        $this->protectivecoil=htmlspecialchars(strip_tags($this->protectivecoil));
        $this->unitinsul=htmlspecialchars(strip_tags($this->unitinsul));
        $this->nonstandard=htmlspecialchars(strip_tags($this->nonstandard));
        $this->totalcost=htmlspecialchars(strip_tags($this->totalcost));

        $statement = $this->conn->prepare($qry);
        
        $statement->bindParam(":shipsplit",$this->shipsplit);
        $statement->bindParam(":compressoracoustic",$this->compressoracoustic);
        $statement->bindParam(":protectivecoil",$this->protectivecoil);
        $statement->bindParam(":unitinsul",$this->unitinsul);
        $statement->bindParam(":nonstandard",$this->nonstandard);
        $statement->bindParam(":totalcost",$this->totalcost);

        if($statement->execute()){
            return true;
        }return false;
    }

    public function getValuesOnPage6(){
        $qry = "SELECT shipsplit, compressoracoustic, protectivecoil,
        unitinsul, nonstandard, totalcost
        FROM ".$this->table."
        WHERE details = ".$this->details."";

        $statement = $this->conn->prepare($qry);
        $statement->execute();
        return $statement;
    }
}


?>