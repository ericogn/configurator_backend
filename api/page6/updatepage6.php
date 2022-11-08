<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../database/database.php';
include_once '../../models/page6.php';


$database = new Database();
$db = $database->getConnection();

$page6 = new Page6($db);

$data = json_decode(file_get_contents("php://input"));
$page6->details = isset($_GET['details']) ? $_GET['details'] : die();

$page6->shipsplit = $data->shipsplit;
$page6->compressoracoustic = $data->compressoracoustic;
$page6->protectivecoil = $data->protectivecoil;
$page6->unitinsul = $data->unitinsul;
$page6->nonstandard = $data->nonstandard;
$page6->totalcost = $data->totalcost;

if($page6->update()){
    $user_arr=array(
        "shipsplit"=>$page6->shipsplit,
        "compressoracoustic"=>$page6->compressoracoustic,
        "protectivecoil"=>$page6->protectivecoil,
        "unitinsul"=>$page6->unitinsul,
        "nonstandard"=>$page6->nonstandard,
        "totalcost"=>$page6->totalcost
    );
}
else{
    $user_arr=array(
        "shipsplit"=>$page6->shipsplit,
        "compressoracoustic"=>$page6->compressoracoustic,
        "protectivecoil"=>$page6->protectivecoil,
        "unitinsul"=>$page6->unitinsul,
        "nonstandard"=>$page6->nonstandard,
        "totalcost"=>$page6->totalcost
    );
}
print_r(json_encode($user_arr));
?>