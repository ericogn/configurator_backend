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

$page1->details = isset($_GET['details']) ? $_GET['details'] : die();


// if($page1->updatefields()){
//     $user_arr=array(
//         "status" => true,
//         "message" => "Successfully Added!",
//     );
// }
// else{
//     $user_arr=array(
//         "status" => false,
//         "message" => "Something went wrong!"
//     );
// }
// print_r(json_encode($user_arr));
?>