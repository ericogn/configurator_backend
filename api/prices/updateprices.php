<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once '../../database/database.php';
include_once '../../models/prices.php';

$database = new Database();
$db = $database->getConnection();

$price = new Prices($db);

$data = json_decode(file_get_contents("php://input"));
//$price->details = isset($_GET['details']) ? $_GET['details'] : die();


$price->unit = $data->unit;
$price->t15 = $data->t15;
$price->t20 = $data->t20;
$price->t25 = $data->t25;
$price->t30 = $data->t30;
$price->t40 = $data->t40;
$price->t50 = $data->t50;
$price->t60 = $data->t60;
$price->t70 = $data->t70;
$price->t80 = $data->t80;
$price->t90 = $data->t90;
$price->v230 = $data->v230;
$price->v460 = $data->v460;
$price->v575 = $data->v575;
$price->singleleft = $data->singleleft;
$price->singleright = $data->singleright;
$price->doubleleft = $data->doubleleft;
$price->doubleright = $data->doubleright;
$price->blowerdpd = $data->blowerdpd;
$price->blowerecm = $data->blowerecm;
$price->digitalnone = $data->digitalnone;
$price->digitalmix = $data->digitalmix;
$price->scrol = $data->scrol;
$price->speed = $data->speed;

$price->in2merv8 = $data->in2merv8;
$price->in2merv11 = $data->in2merv11;
$price->in2merv13 = $data->in2merv13;
$price->in4merv8 = $data->in4merv8;
$price->in4merv11 = $data->in4merv11;
$price->in4merv13 = $data->in4merv13;
$price->in4merv8and13 = $data->in4merv8and13;

$price->heatnone = $data->heatnone;
$price->kw15 = $data->kw15;
$price->kw20 = $data->kw20;
$price->kw25 = $data->kw25;
$price->kw30 = $data->kw30;
$price->kw40 = $data->kw40;
$price->kw45 = $data->kw45;
$price->kw50 = $data->kw50;
$price->kw60 = $data->kw60;
$price->heatsteamcoil = $data->heatsteamcoil;
$price->heathotwatercoil = $data->heathotwatercoil;

$price->fluid1 = $data->fluid1;
$price->reheattype = $data->reheattype;
$price->airsideecon = $data->airsideecon;
$price->chilledwatercoil = $data->chilledwatercoil;
$price->watersideecon = $data->watersideecon;
$price->heatnreheat = $data->heatnreheat;
$price->fluid2 = $data->fluid2;
$price->nonfused = $data->nonfused;
$price->nonfusedtrue = $data->nonfusedtrue;
$price->phasereversalsens = $data->phasereversalsens;
$price->freezestat = $data->freezestat;
$price->tempavg = $data->tempavg;
$price->condensatepump = $data->condensatepump;
$price->compressorheater = $data->compressorheater;
$price->remotewaterpump = $data->remotewaterpump;
$price->waterswitch = $data->waterswitch;
$price->drycontacts = $data->drycontacts;
$price->vavsingle = $data->vavsingle;
$price->vavmulti = $data->vavmulti;
$price->walltemp = $data->walltemp;
$price->wallhumid = $data->wallhumid;
$price->ducttemp = $data->ducttemp;
$price->ducthumid = $data->ducthumid;
$price->bmsnone = $data->bmsnone;
$price->bmsmstp = $data->bmsmstp;
$price->bmsip = $data->bmsip;
$price->bmsmodbus = $data->bmsmodbus;
$price->bmstobedet = $data->bmstobedet;
$price->marveldisplay = $data->marveldisplay;
$price->scr = $data->scr;
$price->smokedetector = $data->smokedetector;
$price->firestat = $data->firestat;
$price->shipsplit = $data->shipsplit;
$price->compressorcover = $data->compressorcover;
$price->protectivenone = $data->protectivenone;
$price->electrocoil = $data->electrocoil;
$price->heresite = $data->heresite;
$price->unitinsulnone = $data->unitinsulnone;
$price->elastomeric = $data->elastomeric;
$price->doublewall = $data->doublewall;
$price->nonstandard = $data->nonstandard;


if($price->update()){
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