<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once '../../database/database.php';
include_once '../../models/contractors.php';

$database = new Database();
$db = $database->getConnection();

$req = new Contractors($db);

$data = json_decode(file_get_contents("php://input"));

// $req->tonnage = isset($_POST['tonnage']) ? $_POST['tonnage'] : die();
// $req->tonnage = isset($_POST['voltage']) ? $_POST['voltage'] : die();


$req->name = $data->newname;
$req->tochange = $data->nametochange;

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