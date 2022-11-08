<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../database/database.php';
include_once '../../models/projectsaver.php';


$database = new Database();
$db = $database->getConnection();
$req = new Project($db);

$req->details = isset($_GET['details']) ? $_GET['details'] : die();
$result = $req -> delete();



?>