
<?php
if (!isset($_SESSION)) session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");
include '../connectdata.php';
$vincode = $_POST['vincode'];
// $id = $_POST['id'];
// $value = $_POST['value'];
$value = $_POST['result'];
$button = $_POST['button'];
// if(is_integer($value*1)){
//     $value = $value / 10;

// }
$user_create = $_SESSION['IDuser'];


function saveValue($vincode, $value, $user)
{
    global $conn;
    $sqlInsert = 'insert into checking_01_han(IDval,vincode,value,user_create) values';
    $lengthArray = count($value);
    $i = 0;

    foreach ($value as $key => $val) {
        if (is_integer($val * 1)) {
            $val = $val / 10;
        }
        if (++$i < $lengthArray)
            $sqlInsert = $sqlInsert . '("' . $key . '","' . $vincode . '","' . $val . '","' . $user . '"),';
        else
            $sqlInsert = $sqlInsert . '("' . $key . '","' . $vincode . '","' . $val . '","' . $user . '")';
    }
    if (mysqli_query($conn, $sqlInsert)) {
        $query_select_vin02 = 'select COUNT(vincode) as count from vin_02 where vincode="' . $vincode . '"';
        $reuslt = $conn->query($query_select_vin02);
        if ($reuslt->num_rows > 0) {
            $row = $reuslt->fetch_assoc();
            if ($row['count'] > 0) {
                $query_update_vin02 = 'update vin_02 set checked="0" where vincode="' . $vincode . '"';
                if (mysqli_query($conn, $query_update_vin02)) {
                    $query_update_time = 'update plan_vin set datetime="' . date('Y/m/d H:i:s') . '", checked="1" where vincode="' . $vincode . '"';
                    if (mysqli_query($conn, $query_update_time)) {
                        echo json_encode(array("statusCode" => 200,));
                    } else echo json_encode(['statusCode' => 201]);
                } else echo json_encode(array("statusCode" => 201));
            } else {
                $query_insert_vin02 = 'insert into vin_02 (vincode,checked) values("' . $vincode . '","0")';
                if (mysqli_query($conn, $query_insert_vin02)) {
                    echo json_encode(array("statusCode" => 200));
                } else echo json_encode(array("statusCode" => 201));
            }
        } else
            echo json_encode(array("statusCode" => 201));
    } else
        echo json_encode(array("statusCode" => 201));
}


if ($button == 'create') {
    $query = 'select COUNT(ID) as count from checking_01_han where vincode="' . $vincode . '"';

    $reuslt = $conn->query($query);
    if ($reuslt->num_rows > 0) {
        $row = $reuslt->fetch_assoc();
        if ($row['count'] != 0) {

            $query_delete = 'delete from checking_01_han where vincode="' . $vincode . '"';
            if (mysqli_query($conn, $query_delete)) {
                saveValue($vincode, $value, $user_create);
            } else {
                echo json_encode([
                    'statusCode' => 201,
                    'query' => $query_delete
                ]);
            }
        } else {
            saveValue($vincode, $value, $user_create);
        }
    } else {
        echo json_encode([
            'statusCode' => 210,

        ]);
    }
}

?>