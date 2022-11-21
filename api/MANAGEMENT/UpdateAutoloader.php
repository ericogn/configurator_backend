<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once '../../database/database.php';
include_once '../../models/autoloader.php';

$database = new Database();
$db = $database->getConnection();

$req = new Autoloader($db);

$data = json_decode(file_get_contents("php://input"));

// $req->tonnage = isset($_POST['tonnage']) ? $_POST['tonnage'] : die();
// $req->tonnage = isset($_POST['voltage']) ? $_POST['voltage'] : die();


$req->scfmret = $data->SCFMreturnAir;
$req->scfmout = $data->SCFMoutsideAir;
$req->esp = $data->ESP;
$req->eatdb1ret = $data->EvaporatorEATDBreturnAir;
$req->eatdb1out = $data->EvaporatorEATDBoutsideAir;
$req->eatwb1ret = $data->EvaporatorEATWBreturnAir;
$req->eatwb1out = $data->EvaporatprEATWBoutsideAir;
$req->fluid1 = $data->WaterCooledCondenserFluidType;
$req->percent1 = $data->WaterCooledCondenserPercentGlycol;
$req->gpm1 = $data->WaterCooledCondenserGPM;
$req->eft1 = $data->WaterCooledCondenserEFT;
$req->evapfiltertype = $data->EvapFilterType;
$req->heattype = $data->HeatType;
$req->reheattype = $data->ReheatType;
$req->airsideecon = $data->AirSideEconomizer;
$req->eatf = $data->HotWaterCoilEATF;
$req->approxlat = $data->HotWaterCoilApproxLAT;
$req->eft2 = $data->HotWaterCoilEFT;
$req->fluid2 = $data->HotWaterCoilFluidType;
$req->percent2 = $data->HotWaterCoilPercentGlycol;
$req->lftgpm = $data->HotWaterCoilLFTGPM;
$req->eatdb2 = $data->WaterSideEconEATDB;
$req->eatwb2 = $data->WaterSideEconEATWB;
$req->eft3 = $data->WaterSideEconEFT;
$req->approxbtuh = $data->WaterSideEconApproxBTUH;
$req->tonnage = $data->SelectTonnage;
$req->voltage = $data->SelectVoltage;


if($req->update()){
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