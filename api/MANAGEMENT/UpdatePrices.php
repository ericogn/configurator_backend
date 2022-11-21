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


$price->unit = 0;
$price->t15 = $data->unit15Tons;
$price->t20 = $data->unit20Tons;
$price->t25 = $data->unit25Tons;
$price->t30 = $data->unit30Tons;
$price->t40 = $data->unit40Tons;
$price->t50 = $data->unit50Tons;
$price->t60 = $data->unit60Tons;
$price->t70 = $data->unit70Tons;
$price->t80 = $data->unit80Tons;
$price->t90 = $data->unit90Tons;
$price->v230 = $data->voltage230priceAddition;
$price->v460 = $data->voltage460priceAddition;
$price->v575 = $data->voltage575priceAddition;
$price->singleleft = $data->singleModuleLeft;
$price->singleright = $data->singleModuleRight;
$price->doubleleft = $data->doubleModuleLeft;
$price->doubleright = $data->doubleModuleRight;
$price->blowerdpd = $data->DirectDriveParallelBlower;
$price->blowerecm = $data->ECMFansBlower;
$price->digitalnone = $data->NoDigitalScrollCompressor;
$price->digitalmix = $data->DigitalAndStandardScroll;
$price->scrol = $data->DigitalScroll;
$price->speed = $data->DigitalSpeed;

$price->in2merv8 = $data->in2merv8EvapFilter;
$price->in2merv11 = $data->in2merv11EvapFilter;
$price->in2merv13 = $data->in2merv13EvapFilter;
$price->in4merv8 = $data->in4merv8EvapFilter;
$price->in4merv11 = $data->in4merv11EvapFilter;
$price->in4merv13 = $data->in4merv13EvapFilter;
$price->in4merv8and13 = $data->in4merv8and13EvapFilter;

$price->heatnone = $data->NoHeat;
$price->kw15 = $data->kw15stage2;
$price->kw20 = $data->kw20stage2;
$price->kw25 = $data->kw25stage2;
$price->kw30 = $data->kw30stage2;
$price->kw40 = $data->kw40stage2;
$price->kw45 = $data->kw45stage2;
$price->kw50 = $data->kw50stage2;
$price->kw60 = $data->kw60stage2;
$price->heatsteamcoil = $data->SteamCoilNonFrz;
$price->heathotwatercoil = $data->HotWaterCoilApproxLAT;

$price->fluid1 = $data->GlycolWaterCooledCondenser;
$price->reheattype = $data->HotWaterCoilReheat;
$price->airsideecon = $data->ContorsOnlyAirSideEconomizer;
$price->chilledwatercoil = $data->ChilledWaterCoil;
$price->watersideecon = $data->WaterSideEconomizer;
$price->heatnreheat = $data->HeatnReheatTrue;
$price->fluid2 = $data->GlycolHotWaterCoilDesign;
$price->nonfused = $data->NonFusedDisconnectNone;
$price->nonfusedtrue = $data->NonFusedDisconnect600V100Amps;
$price->phasereversalsens = $data->PhaseReversalSensor;
$price->freezestat = $data->Freezestat;
$price->tempavg = $data->FreezestatTempAvg;
$price->condensatepump = $data->CondensatePump;
$price->compressorheater = $data->CompressorHeater;
$price->remotewaterpump = $data->RemoteWaterPump;
$price->waterswitch = $data->WaterFlowProvingSwitch;
$price->drycontacts = $data->OneDryContact;
$price->vavsingle = $data->VAVApplicationTypeSingleZone;
$price->vavmulti = $data->VAVApplicationTypeMultiZone;
$price->walltemp = $data->OneWallMountTempSensor;
$price->wallhumid = $data->OneWallMountHumidTempSensor;
$price->ducttemp = $data->OneDuctMountTempSensor;
$price->ducthumid = $data->OneDuctMountHumidSensor;
$price->bmsnone = $data->BMSCommunicationNone;
$price->bmsmstp = $data->BMSBACnet;
$price->bmsip = $data->BMSBACnetIP;
$price->bmsmodbus = $data->BMSModBus;
$price->bmstobedet = $data->BMSToBeDetermined;
$price->marveldisplay = $data->MarvelDisplay;
$price->scr = $data->SCRForMicroprocessor;
$price->smokedetector = $data->SmokeDetector;
$price->firestat = $data->FireStat;
$price->shipsplit = $data->ShipSplit;
$price->compressorcover = $data->CompressorCover;
$price->protectivenone = $data->ProtectiveInsulationNone;
$price->electrocoil = $data->Electrcoil;
$price->heresite = $data->Heresite;
$price->unitinsulnone = $data->UnitInsulationNone;
$price->elastomeric = $data->ElastomericFoam;
$price->doublewall = $data->DoubleWall;
$price->nonstandard = 0;


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