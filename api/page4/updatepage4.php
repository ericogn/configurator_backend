<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once '../../database/database.php';
include_once '../../models/page4.php';

$database = new Database();
$db = $database->getConnection();

$page4 = new Page4($db);

$data = json_decode(file_get_contents("php://input"));
$page4->details = isset($_GET['details']) ? $_GET['details'] : die();

$page4->nonfused = $data->nonfused;
$page4->phasereversalsens = $data->phasereversalsens;
$page4->freezestat = $data->freezestat;
$page4->tempavg = $data->tempavg;
$page4->condesnatepump = $data->condesnatepump;
$page4->compressorheater = $data->compressorheater;
$page4->remotewaterpump = $data->remotewaterpump;
$page4->waterflowswitch = $data->waterflowswitch;
$page4->contactsqty = $data->contactsqty;
$page4->usedfor = $data->usedfor;




if($page4->update()){
    $user_arr=array(
            "nonfused" =>$page4->nonfused,
            "phasereversalsens" => $page4->phasereversalsens,
            "freezestat" => $page4->freezestat,
            "tempavg"=> $page4->tempavg,
            "condesnatepump"=>$page4->condesnatepump,
            "compressorheater"=>$page4->compressorheater,
            "remotewaterpump"=>$page4->remotewaterpump,
            "waterflowswitch"=>$page4->waterflowswitch,
            "contactsqty"=>$page4->contactsqty,
            "usedfor"=>$page4->usedfor
    );
}
else{
    $user_arr=array(
            "nonfused" =>$page4->nonfused,
            "phasereversalsens" => $page4->phasereversalsens,
            "freezestat" => $page4->freezestat,
            "tempavg"=> $page4->tempavg,
            "condesnatepump"=>$page4->condesnatepump,
            "compressorheater"=>$page4->compressorheater,
            "remotewaterpump"=>$page4->remotewaterpump,
            "waterflowswitch"=>$page4->waterflowswitch,
            "contactsqty"=>$page4->contactsqty,
            "usedfor"=>$page4->usedfor
    );
}
print_r(json_encode($user_arr));
?>