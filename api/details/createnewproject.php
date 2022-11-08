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

$project = new Details($db);

$data = json_decode(file_get_contents("php://input"));

$project->name = $data->name;
$project->reforderno = $data->reforderno;
$project->address = $data->address;
$project->city = $data->city;
$project->country = $data->country;
$project->state = $data->state;
$project->zip = $data->zip;
$project->primarycontact = $data->primarycontact;
$project->engarch = $data->engarch;
$project->owner = $data->owner;
$project->contractor = $data->contractor;
$project->status = $data->status;
$project->type = $data->type;
$project->design = $data->design;


if($project->insert()){
    $user_arr=array(
        "status" => true,
        "message" => "Successfully Added!",
    );
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Something went wrong!"
    );
}
print_r(json_encode($project));

?>