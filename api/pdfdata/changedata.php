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

$pdf->mass = $data->mass;
$pdf->totalcfm =$data->totalcfm;
$pdf->mincfm =$data->mincfm;
$pdf->evaporator =$data->evaporator;
$pdf->eatwbdb =$data->eatwbdb;
$pdf->latwbdb =$data->latwbdb;
$pdf->totalbtuh =$data->totalbtuh;
$pdf->eer =$data->eer;
$pdf->condflow =$data->condflow;
$pdf->pressuredrop =$data->pressuredrop;
$pdf->eft =$data->eft;
$pdf->lft =$data->lft;
$pdf->evapmaterials =$data->evapmaterials;
$pdf->evaprows =$data->evaprows;
$pdf->evapfacearea =$data->evapfacearea;
$pdf->evapfacevel =$data->evapfacevel;
$pdf->condtype =$data->condtype;
$pdf->evapblowerqty =$data->evapblowerqty;
$pdf->evapblowerrpm =$data->evapblowerrpm;
$pdf->blowerkw =$data->blowerkw;
$pdf->heatnominal =$data->heatnominal;
$pdf->heatuse =$data->heatuse;
$pdf->heatamps =$data->heatamps;
$pdf->mincirccapac =$data->mincirccapac;
$pdf->maxoverprotection =$data->maxoverprotection;
$pdf->compressorqty =$data->compressorqty;
$pdf->digitalscrollcomp =$data->digitalscrollcomp;
$pdf->stdscrollcomp =$data->stdscrollcomp;

$pdf->evaptype =$data->evaptype;
$pdf->evapefficiency =$data->evapefficiency;
$pdf->qtysize2 =$data->qtysize2;
$pdf->qtysize4 =$data->qtysize4;
$pdf->refrigerantamount =$data->refrigerantamount;

$pdf->pdfdimension =$data->pdfdimension;
$pdf->quotationterms =$data->quotationterms;
$pdf->tonnage =$data->tonnage;
$pdf->voltage =$data->voltage;

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