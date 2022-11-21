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

$req->tonnage = $data->SelectTonnage;
$req->voltage = $data->SelectVoltage;

$result = $req -> read();



$num = $result -> rowCount();

if ($num > 0){
    $post_arr = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        array_push($post_arr,$row);
    }
    
    //convert to json and output
    echo json_encode($post_arr[0]);
} else{
    echo json_encode(array('message' => 'No data found'));
}

?>