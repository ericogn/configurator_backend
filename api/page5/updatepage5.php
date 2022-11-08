<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once '../../database/database.php';
include_once '../../models/page5.php';

$database = new Database();
$db = $database->getConnection();

$page5 = new Page5($db);

$data = json_decode(file_get_contents("php://input"));
$page5->details = isset($_GET['details']) ? $_GET['details'] : die();


$page5->vavapptype = $data->vavapptype;
$page5->walltempsens = $data->walltempsens;
$page5->wallhumidsens = $data->wallhumidsens;
$page5->ducttempsens = $data->ducttempsens;
$page5->ducthumidsens = $data->ducthumidsens;
$page5->bmscomm = $data->bmscomm;
$page5->marveldisplay = $data->marveldisplay;
$page5->scr = $data->scr;
$page5->smokedetector = $data->smokedetector;
$page5->firestat = $data->firestat;


if($page5->update()){
    $user_arr=array(
        "vavapptype"=>$page5->vavapptype,
        "walltempsens"=>$page5->walltempsens,
        "wallhumidsens"=>$page5->wallhumidsens,
        "ducttempsens"=>$page5->ducttempsens,
        "ducthumidsens"=>$page5->ducthumidsens,
        "bmscomm"=>$page5->bmscomm,
        "marveldisplay"=>$page5->marveldisplay,
        "scr"=>$page5->scr,
        "smokedetector"=>$page5->smokedetector,
        "firestat"=>$page5->firestat
    );
}
else{
    $user_arr=array(
        "vavapptype"=>$page5->vavapptype,
        "walltempsens"=>$page5->walltempsens,
        "wallhumidsens"=>$page5->wallhumidsens,
        "ducttempsens"=>$page5->ducttempsens,
        "ducthumidsens"=>$page5->ducthumidsens,
        "bmscomm"=>$page5->bmscomm,
        "marveldisplay"=>$page5->marveldisplay,
        "scr"=>$page5->scr,
        "smokedetector"=>$page5->smokedetector,
        "firestat"=>$page5->firestat
    );
}
print_r(json_encode($user_arr));

?>