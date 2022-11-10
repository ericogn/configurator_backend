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


$req->scfmret = $data->scfmret;
$req->scfmout = $data->scfmout;
$req->esp = $data->esp;
$req->eatdb1ret = $data->eatdb1ret;
$req->eatdb1mix = $data->eatdb1mix;
$req->eatwb1ret = $data->eatwb1ret;
$req->eatwb1mix = $data->eatwb1mix;
$req->gpm1 = $data->gpm1;
$req->eft1 = $data->eft1;
$req->evapfiltertype = $data->evapfiltertype;
$req->heattype = $data->heattype;
$req->reheattype = $data->reheattype;
$req->airsideecon = $data->airsideecon;
$req->eatf = $data->eatf;
$req->approxlat = $data->approxlat;
$req->eft2 = $data->eft2;
$req->lftgpm = $data->lftgpm;
$req->eatdb2 = $data->eatdb2;
$req->eatwb2 = $data->eatwb2;
$req->eft3 = $data->eft3;
$req->approxbtuh = $data->approxbtuh;
$req->tonnage = $data->tonnage;
$req->voltage = $data->voltage;



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