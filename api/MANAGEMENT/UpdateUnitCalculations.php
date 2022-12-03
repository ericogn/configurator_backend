<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once '../../database/database.php';
include_once '../../models/page3.php';


$database = new Database();
$db = $database->getConnection();

$page3 = new Page3($db);

$data = json_decode(file_get_contents("php://input"));


$page3->totalcooling = $data->TotalCooling;
$page3->sensiblecooling = $data->SensibleCooling;
$page3->latdb = $data->LeavingAirTemperatureDB;
$page3->latwb = $data->LeavingAirTemperatureWB;
$page3->evapfan = $data->EvapFanRPM;
$page3->evapmotor = $data->EvapMotorKW;
$page3->mincfm = $data->MinVAVCFMAllowed;
$page3->tonnage = $data->SelectTonnage;

if($page3->update()){
    $user_arr=array(
        "Status"=>"Update successful"
    );
}
else{
    $user_arr=array(
        "error"=>"true"
    );
}
print_r(json_encode($user_arr));

?>