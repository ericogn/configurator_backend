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


$req->scfmretmin=$data->scfmretmin;
$req->scfmretmax=$data->scfmretmax;
$req->scfmoutmin=$data->scfmoutmin;
$req->scfmoutmax=$data->scfmoutmax;
$req->espmin=$data->espmin;
$req->espmax=$data->espmax;
$req->eatdb1retmin=$data->eatdb1retmin;
$req->eatdb1retmax=$data->eatdb1retmax;
$req->eatdb1outmin=$data->eatdb1outmin;
$req->eatdb1outmax=$data->eatdb1outmax;
$req->eatwb1retmin=$data->eatwb1retmin;
$req->eatwb1retmax=$data->eatwb1retmax;
$req->eatwb1outmin=$data->eatwb1outmin;
$req->eatwb1outmax=$data->eatwb1outmax;
$req->gpmmin=$data->gpmmin;
$req->gpmmax=$data->gpmmax;
$req->eft1min=$data->eft1min;
$req->eft1max=$data->eft1max;
$req->eatfmin=$data->eatfmin;
$req->eatfmax=$data->eatfmax;
$req->approxlatmin=$data->approxlatmin;
$req->approxlatmax=$data->approxlatmax;
$req->eft2min=$data->eft2min;
$req->eft2max=$data->eft2max;
$req->lftgpmmin=$data->lftgpmmin;
$req->lftgpmmax=$data->lftgpmmax;
$req->eatdb2min=$data->eatdb2min;
$req->eatdb2max=$data->eatdb2max;
$req->eatwb2min=$data->eatwb2min;
$req->eatwb2max=$data->eatwb2max;
$req->eft3min=$data->eft3min;
$req->eft3max=$data->eft3max;
$req->btuhmin=$data->btuhmin;
$req->btuhmax=$data->btuhmax;
$req->tonnage = $data->tonnage;
$req->voltage = $data->voltage;


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