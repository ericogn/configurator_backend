<?php

use setasign\Fpdi\Fpdi;



header("Access-Control-Allow-Origin", "*");
header("Access-Control-Allow-Credentials", "true");
header("Access-Control-Allow-Methods", "GET,HEAD,OPTIONS,POST,PUT");
header("Access-Control-Allow-Headers", "Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once('../fpdf/fpdf.php');
require_once('../fpdi/src/autoload.php');
include_once('../database/database.php');
include_once('../models/projectsaver.php');
include_once('../models/prices.php');
include_once('../models/pdfdata.php');
$f= new Fpdi();
/*
    ***********
    GET FROM ITEMS PAGE AND ADD TO PDF.
*/

//

$database = new Database();
$db = $database->getConnection();
$req = new Project($db);
$prices = new Prices($db);
$data = new Pdfdata($db);

$req->details = isset($_GET['details']) ? $_GET['details'] : die();
//getreq
$prc = $prices -> read();
$result = $req -> readwithdetails();

$num = $result -> rowCount();

$modified = $f->setSourceFile('../editPdf/invoicesamplepdf.pdf');

//https://drive.google.com/file/d/14fqhhf_MKP9bVLTGo0XxbMNLNxkW_erA/view?usp=share_link

if ($num > 0){
    $post_arr = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        $p = $prc->fetch(PDO::FETCH_ASSOC);
        
        extract($row);
        extract($p);

        $data->tonnage = $row['tonnage'];
        $data->voltage = $row['voltage'];
        $pdfdata = $data->getOneLine()->fetch(PDO::FETCH_ASSOC);
                
        array_push($post_arr,$row);
        
        break;
    }    
    //convert to json and output
    //echo json_encode($post_arr);
    $template = $f->importPage(1);
    $f->AddPage();
    $f->useTemplate($template);
    $f->SetFont('Helvetica');
    $f->SetTextColor(0, 0, 255);
    $f->SetFontSize(10);
    
    
    $f->setXY(175,10);
    $f->Write(0, $row['lastmodified']);

    $f->setXY(35,25.2);
    $f->Write(0, $row['name']);

    $f->SetXY(35,29.5);
    $f->Write(0, $row['city']);

    $f->SetXY(35,33.8);
    $f->Write(0, 'HVAC INC');
    
    $f->SetXY(35,37.7);
    $f->Write(0, $row['primarycontact']);

    $f->setXY(155,25.2);
    $f->Write(0, $row['reforderno']);

    $f->SetXY(155,29.2);
    $f->Write(0, $row['engarch']);

    $f->SetXY(155,33.8);
    $f->Write(0, $row['owner']);
    
    $f->SetXY(155,37.7);
    $f->Write(0, $row['contractor']);

    //cooling performances

    $f->SetXY(69,53.7);
    $f->Write(0, $pdfdata['mass']);

    $f->SetXY(69,57.7);
    $f->Write(0, $row['voltage']);

    $f->SetXY(69,61.9);
    $f->Write(0, $row['tonnage']);

    $f->SetXY(69,73);
    $f->Write(0, $row['scfmret']);

    $f->SetXY(69,76.5);
    $f->Write(0, $pdfdata['mincfm']);

    $f->SetXY(69,80);
    $f->Write(0, $row['scfmout']);

    $f->SetXY(69,83.5);
    $f->Write(0, $pdfdata['evaporator']);

    $f->SetXY(69,87);
    $f->Write(0, $row['eatdbret']);
    $f->Write(0,' DB / WB ');
    $f->Write(0,$row['eatwbret']);

    $f->SetXY(69,91);
    $f->Write(0, $row['eatdbout']);
    $f->Write(0,' DB / WB ');
    $f->Write(0,$row['eatwbout']);

    $f->SetXY(69,95.5);
    $f->Write(0, $row['approxbtuh']);
    
    $f->SetXY(69,100);
    $f->Write(0, $pdfdata['eer']);

    $f->SetXY(155,73);
    $f->Write(0, $row['fluidtype']);
    
    $f->SetXY(155,76.5);
    $f->Write(0, $row['gpm']);

    $f->SetXY(155,80.4);
    $f->Write(0,$pdfdata['pressuredrop']);

    $f->SetXY(155,84.6);
    $f->Write(0, $row['eft']);

    $f->SetXY(155,88.6);
    $f->Write(0, $row['lftgpm']);

   


    //psyhical data

    $f->SetXY(69,110);
    $f->Write(0, $pdfdata['evapmaterials']);

    $f->SetXY(69,114);
    $f->Write(0, $pdfdata['evaprows']);

    $f->SetXY(69,118);
    $f->Write(0, $pdfdata['evapfacearea']);

    $f->SetXY(69,122);
    $f->Write(0, $pdfdata['evapfacevel']);

    $f->SetXY(155,110);
    $f->Write(0, $pdfdata['condtype']);

    //electrical data
    $f->SetXY(69,133.5);
    $f->Write(0, $pdfdata['evapblowerqty']);

    $f->SetXY(69,137.5);
    $f->Write(0, $pdfdata['evapblowerrpm']);

    $f->SetXY(69,141.2);
    $f->Write(0, $pdfdata['blowerkw']);

    $f->SetXY(69,145.1);
    $f->Write(0, $pdfdata['heatnominal']);

    $f->SetXY(69,149);
    $f->Write(0, $pdfdata['heatuse']);
    
    $f->SetXY(69,152.6);
    $f->Write(0, $pdfdata['heatamps']);

    $f->SetXY(69,156);
    $f->Write(0, $pdfdata['mincirccapac']);
    
    $f->SetXY(69,160);
    $f->Write(0, $pdfdata['maxoverprotection']);

    $f->SetXY(150,134);
    if($row['digitalscrollcomp']=='Digital Scroll (1st circ) + Std Scroll (2nd Circ)'){
        $f->Write(0, 'Digital(1st)+Standard(2nd)');
    }else{
        $f->Write(0, $row['digitalscrollcomp']);
    }
    

    $f->SetXY(165,137.5);
    $f->Write(0, $pdfdata['digitalscrollcomp']);

    $f->SetXY(165,141.5);
    $f->Write(0, $pdfdata['stdscrollcomp']);
    
    
    // evap filter

    $f->SetXY(69,175.3);
    $f->Write(0, $row['evapfiltertype']);

    $f->SetXY(69,179);
    $f->Write(0, $pdfdata['evapefficiency']);

    $f->SetXY(69,183);
    $f->Write(0, $pdfdata['qtysize2']);

    $f->SetXY(69,187);
    $f->Write(0, $pdfdata['qtysize4']);

    //refrigerant

    $f->SetXY(69,202);
    $f->Write(0, $pdfdata['refrigerantamount']);


    $template = $f->importPage(2);
    $f->AddPage();
    $f->useTemplate($template);

    $f->setXY(175,10);
    $f->Write(0, $row['lastmodified']);

    $f->setXY(35,25.2);
    $f->Write(0, $row['name']);

    $f->setXY(35,29.5);
    $f->Write(0, $row['reforderno']);


    $f->setXY(155,25.2);
    $f->Write(0, $row['unittag']);

    $template = $f->importPage(3);
    $f->AddPage('L');
    $f->useTemplate($template);

    $template = $f->importPage(4);
    $f->AddPage();
    $f->useTemplate($template);

    $f->setXY(175,10);
    $f->Write(0, $row['lastmodified']);

    $f->setXY(37.8,25.2);
    $f->Write(0, $row['name']);

    $f->SetXY(37.8,29.5);
    $f->Write(0, $row['city']);

    $f->SetXY(37.8,37.7);
    $f->Write(0, $row['primarycontact']);

    $f->setXY(155,25.2);
    $f->Write(0, $row['reforderno']);

    $f->SetXY(155,29.2);
    $f->Write(0, $row['engarch']);

    $f->SetXY(155,33.8);
    $f->Write(0, $row['owner']);
    
    $f->SetXY(155,37.7);
    $f->Write(0, $row['contractor']);

    //options
    $f->SetXY(12,53);
    $f->Write(0, $row['voltage']);

    $f->SetXY(18,60);
    $f->Write(0, 'Blower: ');
    $f->Write(0, $row['blowertype']);

    $f->SetXY(18,65);
    $f->Write(0, 'Evap Path: ');
    $f->Write(0, $row['evapairpath']);

    $f->SetXY(18,70);
    $f->Write(0, 'Digital scroll comp: ');
    $f->Write(0, $row['digitalscrollcomp']);
 
    $f->SetXY(18,75);
    $f->Write(0, 'Heat type: ');
    $f->Write(0, $row['heattype']);

    $f->SetXY(18,80);
    $f->Write(0, 'Reheat Type: ');
    $f->Write(0, $row['reheattype']);

    $f->SetXY(18,85);
    $f->Write(0, 'Air side economizer: ');
    $f->Write(0, $row['airsideecon']);

    $f->SetXY(18,90);
    $f->Write(0, 'Chilled Water Coil: ');
    $f->Write(0, $row['chilledwatercoil']);

    $f->SetXY(18,95);
    $f->Write(0, 'Water Side Econ: ');
    $f->Write(0, $row['watersideecon']);
    
    $f->SetXY(18,100);
    $f->Write(0, 'Non-Fused Disconnect: ');
    if($row['nonfused']==1){
        $f->Write(0, '600V, 3PH, 100 Amps');
    }
    else{
        $f->Write(0, '0');
    }
    
    $f->SetXY(18,105);
    $f->Write(0,'Phase Reversal Sensor: ');
    $f->Write(0, $row['phasereversalsens']);

    $f->SetXY(18,110);
    $f->Write(0,'Freezestat: ');
    $f->Write(0, $row['freezestat']);

    $f->SetXY(18,115);
    $f->Write(0,'Freezestat Temp Avg: ');
    $f->Write(0, $row['tempavg']);

    $f->SetXY(18,120);
    $f->Write(0,'Condensate Pump: ');
    $f->Write(0, $row['condesnatepump']);

    $f->SetXY(18,125);
    $f->Write(0,'Compressor Heater: ');
    $f->Write(0, $row['compressorheater']);

    $f->SetXY(18,130);
    $f->Write(0,'Remote Water Pump: ');
    $f->Write(0, $row['remotewaterpump']);

    $f->SetXY(18,135);
    $f->Write(0,'Water Flow Switch: ');
    $f->Write(0, $row['waterflowswitch']);

    $f->SetXY(18,140);
    $f->Write(0,'Dry Contacts Quantity: ');
    $f->Write(0, $row['contactsqty']);

    $f->SetXY(18,145);
    $f->Write(0,'VAV App Type: ');
    $f->Write(0, $row['vavapptype']);

    $f->SetXY(18,150);
    $f->Write(0,'Wall Mount Temp Sensor: ');
    $f->Write(0, $row['walltempsens']);

    $f->SetXY(18,155);
    $f->Write(0,'Wall Mount Temp/Humid Sensor: ');
    $f->Write(0, $row['wallhumidsens']);

    $f->SetXY(18,160);
    $f->Write(0,'Duct Mount Temp Sensor: ');
    $f->Write(0, $row['ducttempsens']);

    $f->SetXY(18,165);
    $f->Write(0,'Duct Mount Temp/Humid Sens: ');
    $f->Write(0, $row['ducthumidsens']);

    $f->SetXY(18,170);
    $f->Write(0,'BMS Communication: ');
    $f->Write(0, $row['bmscomm']);

    $f->SetXY(18,175);
    $f->Write(0,'Marvel Display: ');
    $f->Write(0, $row['marveldisplay']);

    $f->SetXY(18,180);
    $f->Write(0,'SCR: ');
    $f->Write(0, $row['scr']);

    $f->SetXY(18,185);
    $f->Write(0,'Smoke Detector: ');
    $f->Write(0, $row['smokedetector']);

    $f->SetXY(18,190);
    $f->Write(0,'Firestat: ');
    $f->Write(0, $row['firestat']);

    // $f->SetXY(18,195);
    // $f->Write(0,'Firestat Temp Avg: ');
    // $f->Write(0, $row['tempavg']);

    $f->SetXY(18,195);
    $f->Write(0,'Compressor Acoustic: ');
    $f->Write(0, $row['compressoracoustic']);

    $f->SetXY(18,200);
    $f->Write(0,'Protective Coil: ');
    $f->Write(0, $row['protectivecoil']);

    $f->SetXY(18,205);
    $f->Write(0,'Unit Insulation: ');
    $f->Write(0, $row['unitinsul']);

    $f->SetXY(18,210);
    $f->Write(0,'Cost For non standard options: ');
    $f->Write(0,$row['totalcost']);


    //prices
    $options_total=array();

    $f->SetXY(180,55);
    $f->Write(0, '$');

    switch($row['tonnage'])
    {
      case '15':
        if($row['voltage']== '208/230V-3P-60'){
            $unitprice = $p['t15']+$p['v230'];
            $f->Write(0, $unitprice);
            
        }else if($row['voltage']== '460V-3P-60'){
            $unitprice = $p['t15']+$p['v460'];
            $f->Write(0, $unitprice);
            
        }else{
            $unitprice = $p['t15']+$p['v575'];
            $f->Write(0, $unitprice);
            
        }
      break;
      case '20':
        if($row['voltage']== '208/230V-3P-60'){
            $unitprice = $p['t20']+$p['v230'];
            $f->Write(0, $unitprice);
            
        }else if($row['voltage']== '460V-3P-60'){
            $unitprice = $p['t20']+$p['v460'];
            $f->Write(0, $unitprice);
            
        }else{
            $unitprice = $p['t20']+$p['v575'];
            $f->Write(0, $unitprice);
            
        }
      break;
      case '25':
        if($row['voltage']== '208/230V-3P-60'){
            $unitprice = $p['t25']+$p['v230'];
            $f->Write(0, $unitprice);
            
        }else if($row['voltage']== '460V-3P-60'){
            $unitprice = $p['t25']+$p['v460'];
            $f->Write(0, $unitprice);
            
        }else{
            $unitprice = $p['t25']+$p['v575'];
            $f->Write(0, $unitprice);
            
        }
      break;
      case '30':
        if($row['voltage']== '208/230V-3P-60'){
            $unitprice = $p['t30']+$p['v230'];
            $f->Write(0, $unitprice);
            
        }else if($row['voltage']== '460V-3P-60'){
            $unitprice = $p['t30']+$p['v460'];
            $f->Write(0, $unitprice);
            
        }else{
            $unitprice = $p['t30']+$p['v575'];
            $f->Write(0, $unitprice);
            
        }
      break;
      case '40':
        if($row['voltage']== '208/230V-3P-60'){
            $unitprice = $p['t40']+$p['v230'];
            $f->Write(0, $unitprice);
            
        }else if($row['voltage']== '460V-3P-60'){
            $unitprice = $p['t40']+$p['v460'];
            $f->Write(0, $unitprice);
            
        }else{
            $unitprice = $p['t40']+$p['v575'];
            $f->Write(0, $unitprice);
           
        }
      break;
      case '50':
        if($row['voltage']== '208/230V-3P-60'){
            $unitprice = $p['t50']+$p['v230'];
            $f->Write(0, $unitprice);
           
        }else if($row['voltage']== '460V-3P-60'){
            $unitprice = $p['t50']+$p['v460'];
            $f->Write(0, $unitprice);
            
        }else{
            $unitprice = $p['t50']+$p['v575'];
            $f->Write(0, $unitprice);
           
        }
      break;
      case '60':
        if($row['voltage']== '208/230V-3P-60'){
            $unitprice = $p['t60']+$p['v230'];
            $f->Write(0, $unitprice);
           
        }else if($row['voltage']== '460V-3P-60'){
            $unitprice = $p['t60']+$p['v460'];
            $f->Write(0, $unitprice);
           
        }else{
            $unitprice = $p['t60']+$p['v575'];
            $f->Write(0, $unitprice);
            
        }
      break;
      case '70':
        if($row['voltage']== '208/230V-3P-60'){
            $unitprice = $p['t70']+$p['v230'];
            $f->Write(0, $unitprice);
            
        }else if($row['voltage']== '460V-3P-60'){
            $unitprice = $p['t70']+$p['v460'];
            $f->Write(0, $unitprice);
           
        }else{
            $unitprice = $p['t70']+$p['v575'];
            $f->Write(0, $unitprice);
            
        }
      break;
      case '80':
        if($row['voltage']== '208/230V-3P-60'){
            $unitprice = $p['t80']+$p['v230'];
            $f->Write(0, $unitprice);
            
        }else if($row['voltage']== '460V-3P-60'){
            $unitprice = $p['t80']+$p['v460'];
            $f->Write(0, $unitprice);
            
        }else{
            $unitprice = $p['t80']+$p['v575'];
            $f->Write(0, $unitprice);
           
        }
      break;
      case '90':
        if($row['voltage']== '208/230V-3P-60'){
            $unitprice = $p['t90']+$p['v230'];
            $f->Write(0, $unitprice);
            
        }else if($row['voltage']== '460V-3P-60'){
            $unitprice = $p['t90']+$p['v460'];
            $f->Write(0, $unitprice);
           
        }else{
            $unitprice = $p['t90']+$p['v575'];
            $f->Write(0, $unitprice);
           
        }
      break;
      default:
      }

    $f->SetXY(180,60);
    $f->Write(0, '$');
    switch($row['module'])
    {
      case 'Single - Left Hand':
        $f->Write(0, $p['singleleft']);
        array_push($options_total, $p['singleleft']);
      break;
      case 'Single - Right Hand':
        $f->Write(0, $p['singleright']);
        array_push($options_total, $p['singleright']);
      break;
      case 'Double - Left Hand':
        $f->Write(0, $p['doubleleft']);
        array_push($options_total, $p['doubleleft']);
      break;
      case 'Double - Right Hand':
        $f->Write(0, $p['doubleright']);
        array_push($options_total, $p['doubleright']);
      break;
      default:
    }
    
    $f->SetXY(180,65);
    $f->Write(0, '$0');

    $f->SetXY(180,70);
    $f->Write(0, '$');
    if($row['digitalscrollcomp'] == 'Digital Scroll (1st circ) + Std Scroll (2nd Circ)'){
        $f->Write(0, $p['digitalmix']);
        array_push($options_total, $p['digitalmix']);
    }
    else if ($row['digitalscrollcomp'] == 'Digital Scroll'){
        $f->Write(0, $p['scrol']);
        array_push($options_total, $p['scrol']);
    }
    else if ($row['digitalscrollcomp'] == 'Digital Speed'){
        $f->Write(0, $p['speed']);
        array_push($options_total, $p['speed']);
    }
    else{
        $f->Write(0, $p['digitalnone']);
        array_push($options_total, $p['digitalnone']);
    }
   
    $f->SetXY(180,75);
    $f->Write(0, '$');
    if($row['heattype'] == 'No heat'){
        $f->Write(0, $p['heatnone']);
        array_push($options_total, $p['heatnone']);
    }else if($row['heattype'] == '15 kW 2-Stage'){
        $f->Write(0, $p['kw15']);
        array_push($options_total, $p['kw15']);
    }else if($row['heattype'] == '20 kW 2-Stage'){
        $f->Write(0, $p['kw20']);
        array_push($options_total, $p['kw20']);
    }else if($row['heattype'] == '25 kW 2-Stage'){
        $f->Write(0, $p['kw25']);
        array_push($options_total, $p['kw25']);
    }else if($row['heattype'] == '30 kW 2-Stage'){
        $f->Write(0, $p['kw30']);
        array_push($options_total, $p['kw30']);
    }else if($row['heattype'] == '40 kW 2-Stage'){
        $f->Write(0, $p['kw40']);
        array_push($options_total, $p['kw40']);
    }else if($row['heattype'] == '45 kW 2-Stage'){
        $f->Write(0, $p['kw45']);
        array_push($options_total, $p['kw45']);
    }else if($row['heattype'] == '50 kW 2-Stage'){
        $f->Write(0, $p['kw50']);
        array_push($options_total, $p['kw50']);
    }else if($row['heattype'] == '60 kW 2-Stage' ){
        $f->Write(0, $p['kw60']);
        array_push($options_total, $p['kw60']);
    } else if($row['heattype'] == 'Steam Coil - Distributing (Non Frz)'){
        $f->Write(0, $p['heatsteamcoil']);
        array_push($options_total, $p['heatsteamcoil']);
    }
    else{
        $f->Write(0, $p['heathotwatercoil']);
        array_push($options_total, $p['heathotwatercoil']);
    }


    $f->SetXY(180,80);
    $f->Write(0, '$');
    if($row['reheattype'] == 'Hot Water Coil'){
        $f->Write(0, $p['reheattype']);
        array_push($options_total,$p['reheattype']);
    }else{
        $f->Write(0, '0');
    }
    

    $f->SetXY(180,85);
    $f->Write(0, '$');
    if($row['airsideecon'] == 'Contors Only'){
        $f->Write(0, $p['airsideecon']);
        array_push($options_total,$p['airsideecon']);
    }else{
        $f->Write(0, '0');
    }
    

    $f->SetXY(180,90);
    $f->Write(0, '$');
    if($row['chilledwatercoil'] == 1){
        $f->Write(0, $p['chilledwatercoil']);
        array_push($options_total,$p['chilledwatercoil']);
    }else{
        $f->Write(0, '0');
    }

    $f->SetXY(180,95);
    $f->Write(0, '$');
    if($row['watersideecon'] == 1){
        $f->Write(0, $p['watersideecon']);
        array_push($options_total,$p['watersideecon']);
    }else{
        $f->Write(0, '$0');
    }
    
    $f->SetXY(180,100);
    $f->Write(0, '$');
    if($row['nonfused'] == 1){
        $f->Write(0, $p['nonfusedtrue']);
        array_push($options_total,$p['nonfusedtrue']);
    }
    else{
        $f->Write(0, $p['nonfused']);
        array_push($options_total,$p['nonfused']);
    }
    

    $f->SetXY(180,105);
    $f->Write(0, '$');
    if($row['phasereversalsens'] == 1){
        $f->Write(0, $p['phasereversalsens']);
        array_push($options_total,$p['phasereversalsens']);
    }
    else{
        $f->Write(0, '0');
    }
    

    
    $f->SetXY(180,110);
    $f->Write(0, '$');
    if($row['freezestat'] == 1){
        $f->Write(0, $p['freezestat']);
        array_push($options_total,$p['freezestat']);
    }
    else{
        $f->Write(0, '0');
    }

    $f->SetXY(180,115);
    $f->Write(0, '$');
    if($row['tempavg'] == 1){
        $f->Write(0, $p['tempavg']);
        array_push($options_total,$p['tempavg']);
    }
    else{
        $f->Write(0, '0');
    }

    $f->SetXY(180,120);
    $f->Write(0, '$');
    if($row['condesnatepump'] == 1){
        $f->Write(0, $p['condensatepump']);
        array_push($options_total,$p['condensatepump']);
    }
    else{
        $f->Write(0, '0');
    }

    $f->SetXY(180,125);
    $f->Write(0, '$');
    if($row['compressorheater'] == 1){
        $f->Write(0, $p['compressorheater']);
        array_push($options_total,$p['compressorheater']);
    }
    else{
        $f->Write(0, '0');
    }

    $f->SetXY(180,130);
    $f->Write(0, '$');
    if($row['remotewaterpump'] == 1){
        $f->Write(0, $p['remotewaterpump']);
        array_push($options_total,$p['remotewaterpump']);
    }
    else{
        $f->Write(0, '0');
    }

    $f->SetXY(180,135);
    $f->Write(0, '$');
    if($row['waterflowswitch'] == 1){
        $f->Write(0, $p['waterswitch']);
        array_push($options_total,$p['waterswitch']);
    }
    else{
        $f->Write(0, '0');
    }

    $f->SetXY(180,140);
    $aux = $p['drycontacts'] * $row['contactsqty'];
    array_push($options_total,$aux);
    $f->Write(0, '$');
    $f->Write(0, floatval($aux));


    $f->SetXY(180,145);
    $f->Write(0, '$');
    if($row['vavapptype'] == 'Multi-Zone'){
        $f->Write(0, $p['vavmulti']);
        array_push($options_total,$p['vavmulti']);
    }
    else{
        $f->Write(0, $p['vavsingle']);
        array_push($options_total,$p['vavsingle']);
    }

    $f->SetXY(180,150);
    $aux = $p['walltemp'] * $row['walltempsens'];
    array_push($options_total,$aux);
    $f->Write(0, '$');
    $f->Write(0, floatval($aux));

    $f->SetXY(180,155);
    $aux = $p['wallhumid'] * $row['wallhumidsens'];
    array_push($options_total,$aux);
    $f->Write(0, '$');
    $f->Write(0, floatval($aux));

    $f->SetXY(180,160);
    $aux = $p['ducttemp'] * $row['ducttempsens'];
    array_push($options_total,$aux);
    $f->Write(0, '$');
    $f->Write(0, floatval($aux));

    $f->SetXY(180,165);
    $aux = $p['ducthumid'] * $row['ducthumidsens'];
    array_push($options_total,$aux);
    $f->Write(0, '$');
    $f->Write(0, floatval($aux));

    $f->SetXY(180,170);
    $f->Write(0, '$');
    if($row['bmscomm'] == 'None'){
        $f->Write(0, $p['bmsnone']);
        array_push($options_total,$p['bmsnone']);
    }else if($row['bmscomm'] == 'BACnet - MS/TP'){
        $f->Write(0, $p['bmsmstp']);
        array_push($options_total,$p['bmsmstp']);
    }else if($row['bmscomm'] == 'BACnet - IP (Ethernet)'){
        $f->Write(0, $p['bmsip']);
        array_push($options_total,$p['bmsip']);
    } else if($row['bmscomm'] == 'ModBus'){
        $f->Write(0, $p['bmsmodbus']);
        array_push($options_total,$p['bmsmodbus']);
    }
    else{
        $f->Write(0, $p['bmstobedet']);
        array_push($options_total,$p['bmstobedet']);
    }
   

    $f->SetXY(180,175);
    $f->Write(0, '$');
    if($row['marveldisplay'] == 1){
        $f->Write(0, $p['marveldisplay']);
        array_push($options_total,$p['marveldisplay']);
    }
    else{
        $f->Write(0, '0');
    }


    $f->SetXY(180,180);
    $f->Write(0, '$');
    if($row['scr'] == 1){
        $f->Write(0, $p['scr']);
        array_push($options_total,$p['scr']);
    }
    else{
        $f->Write(0, '0');
    }

    $f->SetXY(180,185);
    $f->Write(0, '$');
    if($row['smokedetector'] == 1){
        $f->Write(0, $p['smokedetector']);
        array_push($options_total,$p['smokedetector']);
    }
    else{
        $f->Write(0, '0');
    }

    $f->SetXY(180,190);
    $f->Write(0, '$');
    if($row['firestat'] == 1){
        $f->Write(0, $p['firestat']);
        array_push($options_total,$p['firestat']);
    }
    else{
        $f->Write(0, '0');
    }

    // $f->SetXY(180,195);
    // $f->Write(0, '$10');

    $f->SetXY(180,195);
    $f->Write(0, '$');
    if($row['compressoracoustic'] == 1){
        $f->Write(0, $p['compressorcover']);
        array_push($options_total,$p['compressorcover']);
    }
    else{
        $f->Write(0, '0');
    }

    $f->SetXY(180,200);
    $f->Write(0, '$');
    if($row['protectivecoil'] == 'ElectroCoil / E-Coat'){
        $f->Write(0, $p['electrocoil']);
        array_push($options_total,$p['electrocoil']);
    }else if($row['protectivecoil'] == 'Heresite'){
        $f->Write(0, $p['heresite']);
        array_push($options_total,$p['heresite']);
    }
    else{
        $f->Write(0, $p['protectivenone']);
        array_push($options_total,$p['protectivenone']);
    }

    $f->SetXY(180,205);
    $f->Write(0, '$');
    if($row['unitinsul'] == '1 in Elastomeric Foam'){
        $f->Write(0, $p['elastomeric']);
        array_push($options_total,$p['elastomeric']);
    }else if($row['unitinsul'] == 'Double Wall - Solid Panel'){
        $f->Write(0, $p['doublewall']);
        array_push($options_total,$p['doublewall']);
    }
    else{
        $f->Write(0, $p['unitinsulnone']);
        array_push($options_total,$p['unitinsulnone']);
    }

    if($row['heatnreheat'] == 1){
        array_push($options_total, $p['heatnreheat']);
    }
    // if($row['shipsplit'] == 1){
    //     array_push($options_total, $p['shipsplit']);
    // }

    if($row['blowertype'] == 'ECM Fans'){
        array_push($options_total,$p['blowerecm']);
    }else{
        array_push($options_total,$p['blowerdpd']);
    }

    switch($row['evapfiltertype'])
    {
      case '2in MERV 8':
        array_push($options_total,$p['in2merv8']);
      break;
      case '2in MERV 11':
        array_push($options_total,$p['in2merv11']);
      break;
      case '2in MERV 13':
        array_push($options_total,$p['in2merv13']);
      break;
      case '4in MERV 8':
        array_push($options_total,$p['in4merv8']);
      break;
      case '4in MERV 11':
        array_push($options_total,$p['in4merv11']);
      break;
      case '4in MERV 13':
        array_push($options_total,$p['in4merv13']);
      break;
      case '4in MERV 8 and 4 MERV 13':
        array_push($options_total,$p['in4merv8and13']);
      break;
      default:
       
    }
    

    $f->SetXY(180,210);
    $f->Write(0, '$');
    $f->Write(0, $row['totalcost']);
    array_push($options_total,$row['totalcost']);

    $f->SetXY(180,242);
    $f->Write(0, '$');
    $sum = floatval(array_sum($options_total));
    $f->Write(0, floatval($sum));

    $f->SetXY(180,250);
    $f->Write(0, '$');
    $total_per_unit=floatval($sum)+floatval($unitprice);
    $f->Write(0, floatval($total_per_unit));

    $f->SetXY(180,255);
    $f->Write(0, '1');


    $template = $f->importPage(5);
    $f->AddPage();
    $f->useTemplate($template);
    $f->setXY(175,10);
    $f->Write(0, $row['lastmodified']);

    $template = $f->importPage(6);
    $f->AddPage();
    $f->useTemplate($template);
    $f->setXY(175,10);
    $f->Write(0, $row['lastmodified']);


    $f->setXY(175,29);
    $f->Write(0, '$');
    $f->Write(0, $total_per_unit);

    $f->setXY(175,34);
    $f->Write(0, $row['quantity']);


    $f->setXY(175,39);
    $total_net=floatval($row['quantity'])*floatval($total_per_unit);
    $f->Write(0, '$');
    $f->Write(0, $total_net);

    $template = $f->importPage(7);
    $f->AddPage();
    $f->useTemplate($template);
    $f->setXY(175,10);
    $f->Write(0, $row['lastmodified']);

    $f->Output();
} else{
    echo json_encode(array('message' => 'No data found'));
}

// 

// $template = $f->importPage(1);
// $f->AddPage();
// $f->useTemplate($template);

// $template = $f->importPage(2);
// $f->AddPage();
// $f->useTemplate($template);

// $template = $f->importPage(3);
// $f->AddPage();
// $f->useTemplate($template);

// $template = $f->importPage(4);
// $f->AddPage();
// $f->useTemplate($template);

// $template = $f->importPage(5);
// $f->AddPage();
// $f->useTemplate($template);

// $template = $f->importPage(6);
// $f->AddPage();
// $f->useTemplate($template);

// $f->SetFont('Helvetica');
// $f->SetTextColor(0, 0, 0);
// $f->SetFontSize(50);
// $f->setXY(125,125);
// $f->Write(0, 'smth');
// $f->SetXY(150,25);
// $f->Write(0, 'other');
// $f->Write(0, '  $');
// $req->delete();

//$f->Output();
?>