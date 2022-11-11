<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../database/database.php';
include_once '../../models/details.php';


$database = new Database();
$db = $database->getConnection();
$req = new Details($db);

$data = json_decode(file_get_contents("php://input"));

$result = $req -> retriveID();

$num = $result -> rowCount();


$post_arr = array();
while($row = $result->fetch(PDO::FETCH_ASSOC)){
    extract($row);
    array_push($post_arr,$row);
}

//convert to json and output
echo json_encode($post_arr);

?>