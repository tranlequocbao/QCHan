<?php

use ConvertApi\Result;

if (!isset($_SESSION)) session_start();

include '../connectdata.php';
include '../vendor/PHPExcel/Classes/PHPExcel.php';
include '../export/configExcel.php';
$images=$_POST['images'];



$vin_code=$_POST['vin_code'];

date_default_timezone_set("Asia/Ho_Chi_Minh");
        $dayCreate = date('dmY');

$ds = DIRECTORY_SEPARATOR;
$path_export_temp = __DIR__ . $ds . 'files' . $ds . 'export_temp' . $ds . $vin_code;
// $name_file_excel = $vin_code.'_'.$dayCreate;
// $path_file_excel = $path_export_temp . $ds . 'excel' . $ds . $name_file_excel. '.xlsx';

//make folder if not exists
if (!file_exists($path_export_temp. $ds . 'images')) {
    mkdir($path_export_temp. $ds . 'images', 0777, true);
}

if (!file_exists($path_export_temp. $ds . 'excel')) {
    mkdir($path_export_temp. $ds . 'excel', 0777, true);
}
// if (!file_exists($path_export_temp. $ds . 'doned')) {
//     mkdir($path_export_temp. $ds . 'doned', 0777, true);
// }

//remove all image 
if ($handle = opendir($path_export_temp. $ds . 'images')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            try{
                unlink($path_export_temp. $ds . 'images'. $ds . $entry);
            }catch (Exception $e){
               echo json_encode(['code'=>201]);return;
            }
        }
    }
    closedir($handle);
}
//remove excel file
if ($handle = opendir($path_export_temp. $ds . 'excel')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            try{
                unlink($path_export_temp. $ds . 'excel'. $ds . $entry);
            }catch (Exception $e){
               echo json_encode(['code'=>201]);return;
            }
        }
    }
    closedir($handle);
}
$result1=[];

    $result=$images['images'];
    foreach ($result as $nameImg => $valImg) {
       
        $img = str_replace('data:image/png;base64,', '', $valImg);
        $img = str_replace(' ', '+', $img);
       

        $data = base64_decode($img);

        $img_path = $path_export_temp. $ds . 'images' . $ds . $nameImg . '.png';

        file_put_contents($img_path, $data);
    }

//select type body
$infoCar='';
$miniVincode=substr($vin_code,0,9);
$sqlBodyType='SELECT * FROM car_code WHERE car_folder ="'.$miniVincode.'"';
$result=$conn->query($sqlBodyType);
if($result->num_rows>0){
    if($row=$result->fetch_all(MYSQLI_ASSOC)){
        $infoCar=$row['car_folder'];
    }
}

$nameFileExcelUse=$infoCar.'xlsx';
$configFile=$infoCar;

echo json_encode(['code'=>200,'result'=>$result1]);
