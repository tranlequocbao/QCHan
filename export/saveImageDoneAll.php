<?php

use ConvertApi\Result;

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

$nameFileExcelUse = $infoCar . '.xlsx';
$configFile = $infoCar;

//lấy màu sơn
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

//lấy ngày kiểm tra

$sqlDate ='SELECT * FROM checking_02_han WHERE vincode="'.$vin_code.'" ORDER BY time_update DESC LIMIT 1';
$result=$conn->query($sqlDate);
$date='';
if($result){
    if($result->num_rows>0){
        if($row=$result->fetch_assoc()){
            $date=$row['time_update'];
        }
    }
}
$date = date('d-m-Y H:m:s',strtotime($date));
// Loại file cần ghi là file excel phiên bản 2007 trở đi
$fileType = 'Excel2007';
// Tên file cần ghi
$fileName = "../export/files/excel/" . $nameFileExcelUse;


// Load file  lên để tiến hành ghi file
$objPHPExcel = PHPExcel_IOFactory::load($fileName);
function setValue(&$activeSheet, $location, $value, $color){
    return $activeSheet->setCellValue($location,$value)->getStyle($location)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB($color);
}
// nhập dữ liệu vào file excel
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A9', "SỐ KHUNG/VIN#: ".$vin_code."")
    ->setCellValue('V9', "NGÀY KIỂM TRA/DATE: ".$date."");


$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
// Tiến hành ghi file
$objWriter->save($path_file_excel);
echo json_encode(['code' => 200, 'type' => $date]);
return;
