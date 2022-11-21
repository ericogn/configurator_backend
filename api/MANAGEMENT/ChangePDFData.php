<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once '../../database/database.php';
include_once '../../models/pdfdata.php';

$database = new Database();
$db = $database->getConnection();

$pdf = new Pdfdata($db);

$data = json_decode(file_get_contents("php://input"));
//$price->details = isset($_GET['details']) ? $_GET['details'] : die();

$pdf->mass = $data->UnitMass;
$pdf->totalcfm =$data->TotalCFM;
$pdf->mincfm =$data->MinimumCFM;
$pdf->evaporator =$data->EvaporatorESP;
$pdf->eatwbdb =$data->EnteringAirTemperature;
$pdf->latwbdb =$data->LeavingAirTemperature;
$pdf->totalbtuh =$data->TotalBTUH;
$pdf->eer =$data->EnergyEfficiencyRatio;
$pdf->condflow =$data->CondFlow;
$pdf->pressuredrop =$data->PressureDrop;
$pdf->eft =$data->EnteringFluidTemperature;
$pdf->lft =$data->LeavingFluidTemperature;
$pdf->evapmaterials =$data->EvapCoilMaterials;
$pdf->evaprows =$data->EvapCoilRows;
$pdf->evapfacearea =$data->EvapCoilFaceArea;
$pdf->evapfacevel =$data->EvapCoilFaceVelocity;
$pdf->condtype =$data->CondCoilMaterials;
$pdf->evapblowerqty =$data->EvapBlowerQty;
$pdf->evapblowerrpm =$data->EvapBlowerRPM;
$pdf->blowerkw =$data->EvapMotorHP;
$pdf->heatnominal =$data->ElectricHeatNominalKW;
$pdf->heatuse =$data->ElectricHeatUse;
$pdf->heatamps =$data->ElectricHeatAmps;
$pdf->mincirccapac =$data->MinCircuitAmpacity;
$pdf->maxoverprotection =$data->MaxCircuitOverprotection;
$pdf->compressorqty =$data->CompressorQty;
$pdf->digitalscrollcomp =$data->DigitalScrollCompressor;
$pdf->stdscrollcomp =$data->StandardScrollCompressor;

$pdf->evaptype =$data->EvapFilterType;
$pdf->evapefficiency =$data->EvapFilterEfficency;
$pdf->qtysize2 =$data->QuantitySize2in;
$pdf->qtysize4 =$data->QuantitySize4in;
$pdf->refrigerantamount =$data->RefrigerantAmount;

$pdf->pdfdimension ='';
$pdf->quotationterms ='';
$pdf->tonnage =$data->SelectTonnage;
$pdf->voltage =$data->SelectVoltage;

if($pdf->modify()){
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