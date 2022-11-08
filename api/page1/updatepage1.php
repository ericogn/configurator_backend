<?php


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once '../../database/database.php';
include_once '../../models/page1.php';


$database = new Database();
$db = $database->getConnection();

$page1 = new Page1($db);

$data = json_decode(file_get_contents("php://input"));

$page1->details = isset($_GET['details']) ? $_GET['details'] : die();

$page1->quantity = $data->quantity;
$page1->unittag = $data->unittag;
$page1->basemodel = $data->basemodel;
$page1->producttype = $data->producttype;
$page1->tonnage = $data->tonnage;
$page1->voltage = $data->voltage;
$page1->module = $data->module;
$page1->blowertype = $data->blowertype;
$page1->evapairpath = $data->evapairpath;
$page1->digitalscrollcomp = $data->digitalscrollcomp;


if($page1->update()){
    $user_arr=array(
        "quantity"=>$page1->quantity,
        "unittag"=>$page1->unittag,
        "basemodel"=>$page1->basemodel,
        "producttype"=>$page1->producttype,
        "tonnage"=>$page1->tonnage,
        "voltage"=>$page1->voltage,
        "module"=>$page1->module,
        "blowertype"=>$page1->blowertype,
        "evapairpath"=>$page1->evapairpath,
        "digitalscrollcomp"=>$page1->digitalscrollcomp
    );
}
else{
    $user_arr=array(
        "quantity"=>$page1->quantity,
        "unittag"=>$page1->unittag,
        "basemodel"=>$page1->basemodel,
        "producttype"=>$page1->producttype,
        "tonnage"=>$page1->tonnage,
        "voltage"=>$page1->voltage,
        "module"=>$page1->module,
        "blowertype"=>$page1->blowertype,
        "evapairpath"=>$page1->evapairpath,
        "digitalscrollcomp"=>$page1->digitalscrollcomp
    );
}
print_r(json_encode($user_arr));
?>