<?php


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once '../../database/database.php';
include_once '../../models/page2.php';


$database = new Database();
$db = $database->getConnection();

$page2 = new Page2($db);

$data = json_decode(file_get_contents("php://input"));

$page2->details = isset($_GET['details']) ? $_GET['details'] : die();

$page2->scfmret = $data->scfmret;
$page2->espret = $data->espret;
$page2->eatdbret = $data->eatdbret;
$page2->eatwbret = $data->eatwbret;

$page2->scfmout = $data->scfmout;
$page2->espout = $data->espout;
$page2->eatdbout = $data->eatdbout;
$page2->eatwbout = $data->eatwbout;

$page2->scfmmix = $data->scfmmix;
$page2->espmix = $data->espmix;
$page2->eatdbmix = $data->eatdbmix;
$page2->eatwbmix = $data->eatwbmix;

$page2->mixedair = $data->mixedair;
$page2->fluidtype = $data->fluidtype;
$page2->percentglycol = $data->percentglycol;
$page2->gpm = $data->gpm;
$page2->eft = $data->eft;
$page2->evapfiltertype = $data->evapfiltertype;
$page2->heattype = $data->heattype;
$page2->reheattype = $data->reheattype;
$page2->airsideecon = $data->airsideecon;
$page2->electrictemprise = $data->electrictemprise;
$page2->chilledwatercoil = $data->chilledwatercoil;
$page2->watersideecon = $data->watersideecon;
$page2->heatnreheat = $data->heatnreheat;
$page2->eatf = $data->eatf;
$page2->approxlat = $data->approxlat;
$page2->eft2 = $data->eft2;
$page2->percentglycol2 = $data->percentglycol2;
$page2->fluidtype2 = $data->fluidtype2;
$page2->lftgpm = $data->lftgpm;
$page2->lftgpmvalue = $data->lftgpmvalue;
$page2->eatdb2 = $data->eatdb2;
$page2->eatwb2 = $data->eatwb2;
$page2->eft3 = $data->eft3;
$page2->approxbtuh = $data->approxbtuh;


if($page2->update()){
    $user_arr=array(
        "scfmret" => $page2->scfmret,
        "espret"=>$page2->espret,
        "eatdbret"=>$page2->eatdbret,
        "eatwbret"=>$page2->eatwbret,
        "scfmout"=>$page2->scfmout,
        "espout"=>$page2->espout,
        "eatdbout"=>$page2->eatdbout,
        "eatwbout"=>$page2->eatwbout,
        "scfmmix"=>$page2->scfmmix,
        "espmix"=>$page2->espmix,
        "eatdbmix"=>$page2->eatdbmix,
        "eatwbmix"=>$page2->eatwbmix,
        "mixedair"=>$page2->mixedair,
        "fluidtype"=>$page2->fluidtype,
        "percentglycol"=>$page2->percentglycol,
        "gpm"=>$page2->gpm,
        "eft"=>$page2->eft,
        "evapfiltertype"=>$page2->evapfiltertype,
        "heattype"=>$page2->heattype,
        "reheattype"=>$page2->reheattype,
        "airsideecon"=>$page2->airsideecon,
        "electrictemprise"=>$page2->electrictemprise,
        "chilledwatercoil"=>$page2->chilledwatercoil,
        "watersideecon"=>$page2->watersideecon,
        "heatnreheat"=>$page2->heatnreheat,
        "eatf"=>$page2->eatf,
        "approxlat"=>$page2->approxlat,
        "eft2"=>$page2->eft2,
        "percentglycol2"=>$page2->percentglycol2,
        "fluidtype2"=>$page2->fluidtype2,
        "lftgpm"=>$page2->lftgpm,
        "lftgpmvalue"=>$page2->lftgpmvalue,
        "eatdb2"=>$page2->eatdb2,
        "eatwb2"=>$page2->eatwb2,
        "eft3"=>$page2->eft3,
        "approxbtuh"=>$page2->approxbtuh,
        "lastmodified" =>$page2->lastmodified
    );
}
else{
    $user_arr=array(
        "scfmret" => $page2->scfmret,
        "espret"=>$page2->espret,
        "eatdbret"=>$page2->eatdbret,
        "eatwbret"=>$page2->eatwbret,
        "scfmout"=>$page2->scfmout,
        "espout"=>$page2->espout,
        "eatdbout"=>$page2->eatdbout,
        "eatwbout"=>$page2->eatwbout,
        "scfmmix"=>$page2->scfmmix,
        "espmix"=>$page2->espmix,
        "eatdbmix"=>$page2->eatdbmix,
        "eatwbmix"=>$page2->eatwbmix,
        "mixedair"=>$page2->mixedair,
        "fluidtype"=>$page2->fluidtype,
        "percentglycol"=>$page2->percentglycol,
        "gpm"=>$page2->gpm,
        "eft"=>$page2->eft,
        "evapfiltertype"=>$page2->evapfiltertype,
        "heattype"=>$page2->heattype,
        "reheattype"=>$page2->reheattype,
        "airsideecon"=>$page2->airsideecon,
        "electrictemprise"=>$page2->electrictemprise,
        "chilledwatercoil"=>$page2->chilledwatercoil,
        "watersideecon"=>$page2->watersideecon,
        "heatnreheat"=>$page2->heatnreheat,
        "eatf"=>$page2->eatf,
        "approxlat"=>$page2->approxlat,
        "eft2"=>$page2->eft2,
        "percentglycol2"=>$page2->percentglycol2,
        "fluidtype2"=>$page2->fluidtype2,
        "lftgpm"=>$page2->lftgpm,
        "lftgpmvalue"=>$page2->lftgpmvalue,
        "eatdb2"=>$page2->eatdb2,
        "eatwb2"=>$page2->eatwb2,
        "eft3"=>$page2->eft3,
        "approxbtuh"=>$page2->approxbtuh,
        "lastmodified" =>$page2->lastmodified
    );
}
print_r(json_encode($user_arr));
?>