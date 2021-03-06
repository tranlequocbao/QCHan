<?php

use ConvertApi\Result;
use Phinx\Console\Command\Test;

if (!isset($_SESSION)) session_start();

include '../connectdata.php';
include '../vendor/PHPExcel/Classes/PHPExcel.php';
include '../export/configExcel.php';

$images = $_POST['images'];



$vin_code = $_POST['vin_code'];

date_default_timezone_set("Asia/Ho_Chi_Minh");
$dayCreate = date('dmY');

$ds = DIRECTORY_SEPARATOR;
$path_export_temp = __DIR__ . $ds . 'files' . $ds . 'export_temp' . $ds . $vin_code;
$name_file_excel = $vin_code . '_' . $dayCreate;
$path_file_excel = $path_export_temp . $ds . 'excel' . $ds . $name_file_excel . '.xlsx';
$pathDownload= 'files' . $ds . 'export_temp' . $ds . $vin_code. $ds . 'excel' . $ds . $name_file_excel . '.xlsx';
//make folder if not exists
if (!file_exists($path_export_temp . $ds . 'images')) {
    mkdir($path_export_temp . $ds . 'images', 0777, true);
}

if (!file_exists($path_export_temp . $ds . 'excel')) {
    mkdir($path_export_temp . $ds . 'excel', 0777, true);
}
// if (!file_exists($path_export_temp. $ds . 'doned')) {
//     mkdir($path_export_temp. $ds . 'doned', 0777, true);
// }

//remove all image 
if ($handle = opendir($path_export_temp . $ds . 'images')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            try {
                unlink($path_export_temp . $ds . 'images' . $ds . $entry);
            } catch (Exception $e) {
                echo json_encode(['code' => 201]);
                return;
            }
        }
    }
    closedir($handle);
}
//remove excel file
if ($handle = opendir($path_export_temp . $ds . 'excel')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            try {
                unlink($path_export_temp . $ds . 'excel' . $ds . $entry);
            } catch (Exception $e) {
                echo json_encode(['code' => 201]);
                return;
            }
        }
    }
    closedir($handle);
}
$result1 = [];

$result = $images['images'];
foreach ($result as $nameImg => $valImg) {

    $img = str_replace('data:image/png;base64,', '', $valImg);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    $img_path = $path_export_temp . $ds . 'images' . $ds . $nameImg . '.png';
    file_put_contents($img_path, $data);
}

//select type body
$infoCar = '';
$miniVincode = substr($vin_code, 0, 9);
$sqlBodyType = 'SELECT * FROM car_code WHERE car_code ="' . $miniVincode . '"';
$result = $conn->query($sqlBodyType);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $infoCar = $row['car_folder'];
}
$configFile = '';
$nameFileExcelUse = $infoCar . '.xlsx';
if ($infoCar == 'J59C_SD') $configFile = $J59C_SD;
else if ($infoCar == 'J59C_HB') $configFile = $J59C_HB;
else if ($infoCar == 'J72A') $configFile = $J72A;
else if ($infoCar == 'J72K') $configFile = $J72K;
else if ($infoCar == 'J71E') $configFile = $J71E;
// print_r($sqlBodyType); return;
//l???y m??u s??n
$sqlInfocar = 'SELECT * FROM plan_vin WHERE vincode="' . $vin_code . '"';
$result = $conn->query($sqlInfocar);
$color = '';
if ($result) {
    if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
            $color = $row['color'];
        }
    }
}

//l???y ng??y ki???m tra

$sqlDate = 'SELECT * FROM checking_02_han WHERE vincode="' . $vin_code . '" ORDER BY time_update DESC LIMIT 1';
$result = $conn->query($sqlDate);
$date = '';
if ($result) {
    if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
            $date = $row['time_update'];
        }
    }
}
$date = date('d-m-Y H:m:s', strtotime($date));
// Lo???i file c???n ghi l?? file excel phi??n b???n 2007 tr??? ??i
$fileType = 'Excel2007';
// T??n file c???n ghi
$fileName = "../export/files/excel/" . $nameFileExcelUse;


// Load file  l??n ????? ti???n h??nh ghi file
$objPHPExcel = PHPExcel_IOFactory::load($fileName);
function setValue(&$activeSheet, $location, $value, $color)
{
    return $activeSheet->setCellValue($location, $value)->getStyle($location)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB($color);
}

//get value and location khe h??? ????? ph???ng from database
$sqlKHDP = 'SELECT `IDval`,`value` FROM checking_01_han WHERE vincode="' . $vin_code . '"';
$result = $conn->query($sqlKHDP);
$KHDP = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $KHDP[$row['IDval']] = $row['value'];
    }
}
//get Shop

if (isset($_SESSION['Shop']))
    $shop = $_SESSION['Shop'];
if (isset($_SESSION['Position']))
    $station = $_SESSION['Position'];
// nh???p d??? li???u v??o file excel
extract($tittle);
//th??m th??ng tin cho phi???u
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue($vincode, "S??? KHUNG/VIN#: " . $vin_code . "")
    ->setCellValue($dateUp, "NG??Y KI???M TRA/DATE: " . $date . "");

//th??m khe h??? ????? ph???ng
foreach ($KHDP as $key => $value) {
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue($configFile['station1'][$key], $value);
}

$check = array_merge($configFile['LH'], $configFile['RH']);
$demo = [];
//tich ?????t ho???c kh??ng ?????t
foreach ($check as $key => $value) {
    
    if (gettype($value) != "array") {

        if ($objPHPExcel->setActiveSheetIndex(0)->getCell($value)->getValue() != "X") {
           
            if (checkError($key, $vin_code) == true) {
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue($value, 'V');
            } else {
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue($value, 'X');
            }
        }
    } else {
        foreach ($value as $val) {
            if ($objPHPExcel->setActiveSheetIndex(0)->getCell($val)->getValue() != "X") {
               
                if (checkError($key, $vin_code) == true) {
                    $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue($val, 'V');
                } else {
                    $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue($val, 'X');
                }
            }
        }
    }
}
//load v?? add h??nh v??o excel
$loadImg = recursiveSearch("../export/files/export_temp".$ds.$vin_code.$ds."images/", "/^.*\.(jpg|jpeg|png)$/");
$heightSignature = 70;
$weightSignature = 90;
foreach($loadImg as $value){
   
    $arryPath=explode("/",$value['image']);
   // print_r(end($arryPath)."<br/>") ;
    $filename=end($arryPath); 
    $val =explode(".",$filename);

    $coordinates=$configFile['images'][$val[0]];
    draw($objPHPExcel,$val[0], $coordinates,$value['image'],$path_file_excel,$heightSignature,$weightSignature);
}
// load h??nh con d???u v??o
// con d???u khe h??? ????? ph???ng

$khdpSign='';
$sql_sig='SELECT * FROM checking_01_han WHERE vincode="'.$vin_code.'" LIMIT 1';
$result=$conn->query($sql_sig);
if($result->num_rows>0){
    if($row=$result->fetch_assoc()){
        $khdpSign=$row['user_create'];
        $path=realpath("../page/assets/img/Stamp/".$khdpSign.".png");
        draw($objPHPExcel,'Khe h??? ????? ph???ng',$configFile['Signature']['KHDP'],$path,$path_file_excel,'68','68');
    }
}
//con d??u LH
$LH='';
$sql_sig='SELECT * FROM checking_02_han WHERE vincode="'.$vin_code.'" AND error_user="LH" LIMIT 1';
$result=$conn->query($sql_sig);
if($result->num_rows>0){
    if($row=$result->fetch_assoc()){
        $LH=$row['user_code'];
        $path=realpath("../page/assets/img/Stamp/".$LH.".png");
        draw($objPHPExcel,'LH',$configFile['Signature']['Pos1'],$path,$path_file_excel,'68','68');
        draw($objPHPExcel,'LH',$configFile['Signature']['Pos3'],$path,$path_file_excel,'68','68');
    }
}
//con d??u RH
$RH='';
$sql_sig='SELECT * FROM checking_02_han WHERE vincode="'.$vin_code.'" AND error_user="RH" LIMIT 1';
$result=$conn->query($sql_sig);
if($result->num_rows>0){
    if($row=$result->fetch_assoc()){
        $RH=$row['user_code'];
        $path=realpath("../page/assets/img/Stamp/".$RH.".png");
        draw($objPHPExcel,'RH',$configFile['Signature']['Pos2'],$path,$path_file_excel,'68','68');
        draw($objPHPExcel,'RH',$configFile['Signature']['Pos4'],$path,$path_file_excel,'68','68');
    }
}
//Kh???c ch??? nh??n s??? x?????ng LH
$RH='';
$sql_sig='SELECT * FROM car_qc1k_submit WHERE username="Tr???m 3" AND car_code="'.$vin_code.'" AND povilish="LH" LIMIT 1';
$result=$conn->query($sql_sig);

if($result->num_rows>0){
    if($row=$result->fetch_assoc()){
        $RH=$row['fullname'];
    
        $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue($configFile['Signature']['Repair1'],$RH);
    }
}
//Kh???c ch??? nh??n s??? x?????ng RH
$RH='';
$sql_sig='SELECT * FROM car_qc1k_submit WHERE username="Tr???m 3" AND car_code="'.$vin_code.'" AND povilish="RH" LIMIT 1';
$result=$conn->query($sql_sig);

if($result->num_rows>0){
    if($row=$result->fetch_assoc()){
        $RH=$row['fullname'];

        
        $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue($configFile['Signature']['Repair2'],$RH);
    }
}

//con d??u Metal Finish
$RH='';
$sql_sig='SELECT * FROM car_qc1k_submit WHERE username="Tr???m 4" AND car_code="'.$vin_code.'" LIMIT 1';
$result=$conn->query($sql_sig);
if($result->num_rows>0){
    if($row=$result->fetch_assoc()){
        $RH=$row['usercode'];
        $path=realpath("../page/assets/img/Stamp/".$RH.".png");
        draw($objPHPExcel,'RH',$configFile['Signature']['Pos5'],$path,$path_file_excel,'68','68');
      
    }
}
function draw(&$excel, $fileName, $coordinates,$signaturePath,$path_file_excel,$heightSignature,$weightSignature){
    if(!file_exists($signaturePath)){
        return true;
    }
    $drawing = new PHPExcel_Worksheet_MemoryDrawing();
    $drawing->setName('Img of ' . $fileName)
        ->setDescription('Img of ' . $fileName)
        ->setImageResource(imagecreatefrompng($signaturePath))
        ->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG)
        ->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT)
        ->setHeight($heightSignature)
        ->setWidth($weightSignature)
        ->setCoordinates($coordinates)
        ->setWorksheet($excel->getActiveSheet());
    $objWrite = PHPExcel_IOFactory::createWriter($excel,'Excel2007');
    $objWrite->save($path_file_excel);
    return true;
}


function checkError($location, $vin_code)
{
    global $conn;
    $check = true;
    $sqlCheck = 'SELECT COUNT(error_position) as count FROM `checking_02_han` WHERE vincode="'. $vin_code . '" AND error_position="' . $location . '"';
    $demo[] = $sqlCheck;
    $result = $conn->query($sqlCheck);
    if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc())
            if($row['count']!='0')
            $check = false;
    }
    return $check;
}
function recursiveSearch($folder, $pattern)
{
    $dir = new RecursiveDirectoryIterator($folder);
    $ite = new RecursiveIteratorIterator($dir);
    $files = new RegexIterator($ite, $pattern, RegexIterator::GET_MATCH);
    $fileList = array();
    foreach ($files as $file) {
        $fileList[] = array(
            'image' => str_replace('\\', '/', $file[0])
        );
    }
    return $fileList;
}
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
// Ti???n h??nh ghi file
$objWriter->save($path_file_excel);

echo json_encode(['code' => 200, 'path' => $pathDownload]);
