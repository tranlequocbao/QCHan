<?php
$url=$_SERVER['DOCUMENT_ROOT'];
require_once $url.'/QC_Han/connectdata.php';
    $startDate =$_POST['startDate'];
    $endDate=$_POST['endDate'];
    $listError=$_POST['listError'];
    $rawData=$complData=$title=[];
     $vincode=$errorType=$errorPosition="";
     $sql_rawData='SELECT vincode,error_type,error_position,time_currnet, "1" as total FROM `checking_02_han` WHERE time_currnet BETWEEN "'.$startDate.'" AND "'.$endDate.'" ORDER by vincode,error_type,error_position asc';
        $result = $conn->query($sql_rawData);
        if($result->num_rows>0){
        while($row=$result->fetch_all(MYSQLI_ASSOC)){
             $rawData=$row;   
        }
     }
     // $sql_rawData='SELECT DISTINCT error_position FROM `checking_02_han` WHERE time_currnet BETWEEN "'.$startDate.'" AND "'.$endDate.'" ORDER by error_position asc';
     //    $result = $conn->query($sql_rawData);
     //    if($result->num_rows>0){
     //    while($row=$result->fetch_all(MYSQLI_ASSOC)){
     //         $title=$row;   
     //    }
     // }
     foreach($rawData as $key=>$value){
          
          if($value['vincode']===$vincode&&$value['error_type']===$errorType&&$value['error_position']===$errorPosition){
               // end($complData['total'])=(int)$value['total']+ (int);
               end($complData);
               $key=key($complData);
               $complData[$key]['total']=$complData[$key]['total']+1;
               
          }else{
               array_push($complData,$value);
               $vincode=$value['vincode']; $errorType=$value['error_type'];$errorPosition=$value['error_position'];
          }
     }  
     $info=[]; 
     foreach($complData as $key=>$value){
          $compact=explode('-',$complData[$key]['error_position']);
          $complData[$key]['error_position']=$compact[1];
          array_push($title,$complData[$key]['error_position']);
          $info=info($complData[$key]['vincode']);
          $complData[$key]['error_type']=$listError[$complData[$key]['error_type']];
          //print_r($info) ;
         // array_push($info,info($complData[$key]['vincode']));
        
         if(isset($info['type'])&&isset($info['color'])){
          $complData[$key]['bodyType']=$info['type'];
          $complData[$key]['color']=$info['color'];
         }
         else{
          $complData[$key]['bodyType']='';
          $complData[$key]['color']='';
         }
          
     }
     $title=array_unique($title);
     $complTitlte=[];
     $key__=0;
     foreach($title as $key =>$value){
         $complTitlte[$key__]=$value;
          $key__++;
     }
function info($vincode){
     $result_=[];
     global $conn;

     $sql = 'SELECT * FROM plan_vin WHERE vincode="'.$vincode.'" LIMIT 1';
     $result = $conn->query($sql);
     if($result->num_rows>0){
          $row=$result->fetch_assoc();
              $result_=$row;
          
     }
     return $result_;
}     
echo json_encode(['code'=>'200','data'=>$complData,'title'=>$complTitlte]);
       
?>