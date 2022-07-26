<?php

if (!isset($_SESSION)) session_start();
if (!isset($_POST)) {
    echo json_encode([
        'code' => 401,
        'message' => 'You haven\'t permision!'
    ]);
    return true;
}
$url = $_SERVER['DOCUMENT_ROOT'];

require_once $url . '/QC_Han/connectdata.php';


$datas = [];
$title=$_POST['title'];
if (isset($_POST['data1'])) {
    $result = $_POST['data1'];
    //$cou = count($datas);
    $datas = json_decode($result, true);
    
} else {
    echo json_encode(['code' => 201]);
    return true;
}
if ($datas == null) {
    echo json_encode([
        'code' => 303,
        'message' => 'Sort options error or database not have record!'
    ]);
    return true;
}

require_once '../vendor/PHPExcel/Classes/PHPExcel.php';
require_once '../vendor/PHPExcel/Classes/PHPExcel/IOFactory.php';

$excel = new PHPExcel();
//Chọn trang cần ghi (là số từ 0->n)
$excel->setActiveSheetIndex(0);
//Tạo tiêu đề cho trang. (có thể không cần)
$excel->getActiveSheet()->setTitle('Xuất Excel');
$activeSheet = $excel->getActiveSheet();

$date = date('d-m-Y');



// if ($timeS != '' || $timeE != '') {
//     $date = $timeS . '_' . $timeE;
// }

$name = 'ADMIN_DETAIL_' . $date . '_' . round(microtime(true) * 1000) . '.xlsx';

$path_file = 'ExcelFiles/' . $name;
$i = 0;
$key1=$value1=[];
  
foreach ($datas[0] as $data1){
    foreach($data1 as $key =>$value){
        $activeSheet->setCellValueByColumnAndRow($i,1 , $key);
         $i++;
    }
}
$j=2;

foreach ($datas as $data1){
    $i=0;
    foreach($data1 as $key =>$value){
        foreach($value as $va){
            $activeSheet->setCellValueByColumnAndRow($i,$j , $va);
        }
        $i++;
    }
     $j++;
}
// foreach ($datas as $data1) {
//     foreach($data1 as $data2 ){
//         $key1[] = $data1;
//         foreach($data2 as $key =>$value){
//             // $activeSheet->setCellValueByColumnAndRow($i,1 , $key);
//             // $i++;
           
//         }
//         break;
//     }
    
//     //$activeSheet->setCellValueByColumnAndRow(1, $i, $key);
// }

$objWrite = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$objWrite->save('ExcelFiles/' . $name);

echo json_encode([
    'code' => 200,
    'url' => $path_file
]);
