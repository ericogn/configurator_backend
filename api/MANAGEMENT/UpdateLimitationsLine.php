<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once '../../database/database.php';
include_once '../../models/limitations.php';

$database = new Database();
$db = $database->getConnection();

$req = new Limitations($db);

$data = json_decode(file_get_contents("php://input"));

// $req->tonnage = isset($_POST['tonnage']) ? $_POST['tonnage'] : die();
// $req->tonnage = isset($_POST['voltage']) ? $_POST['voltage'] : die();


$req->scfmretmin=$data->minSCFMreturnAir;
$req->scfmretmax=$data->maxSCFMreturnAir;
$req->scfmoutmin=$data->minSCMFoutsideAir;
$req->scfmoutmax=$data->maxSCFMoutsideAir;
$req->espmin=$data->minESP;
$req->espmax=$data->maxESP;
$req->eatdb1retmin=$data->minEvaporatorEATDBreturn;
$req->eatdb1retmax=$data->maxEvaporatorEATDBreturn;
$req->eatdb1outmin=$data->minEvaporatorEATDBoutside;
$req->eatdb1outmax=$data->maxEvaporatorEATDBoutside;
$req->eatwb1retmin=$data->minEvaporatorEATWBreturn;
$req->eatwb1retmax=$data->maxEvaporatorEATWBreturn;
$req->eatwb1outmin=$data->minEvaporatorEATWBoutside;
$req->eatwb1outmax=$data->maxEvaporatorEATWBoutside;
$req->gpmmin=$data->minGPMwatercooled;
$req->gpmmax=$data->maxGPMwatercooled;
$req->eft1min=$data->minEFTwatercooled;
$req->eft1max=$data->maxEFTwatercooled;
$req->eatfmin=$data->minEATF;
$req->eatfmax=$data->maxEATF;
$req->approxlatmin=$data->minApproxLAT;
$req->approxlatmax=$data->maxApproxLAT;
$req->eft2min=$data->minEFThotWaterCoil;
$req->eft2max=$data->maxEFThotWaterCoil;
$req->lftgpmmin=$data->minLFTGPMhotWaterCoil;
$req->lftgpmmax=$data->maxLFTGPMhotWaterCoil;
$req->eatdb2min=$data->minEATDBwaterSideEconomizer;
$req->eatdb2max=$data->maxEATDBwaterSideEconomizer;
$req->eatwb2min=$data->minEATWBwaterSideEconomizer;
$req->eatwb2max=$data->maxEATWBwaterSideEconomizer;
$req->eft3min=$data->minEFTwaterSideEconomizer;
$req->eft3max=$data->maxEFTwaterSideEconomizer;
$req->btuhmin=$data->minBTUHwaterSideEconomizer;
$req->btuhmax=$data->maxBTUHwaterSideEconomizer;
$req->tonnage = $data->SelectTonnage;
$req->voltage = $data->SelectVoltage;


if($req->updateLine()){
    $user_arr=array(
        "error"=>"false"
    );
}
else{
    $user_arr=array(
        "error"=>"true"
    );
}
print_r(json_encode($user_arr));


?>