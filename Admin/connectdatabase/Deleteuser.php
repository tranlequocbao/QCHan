<?php 
$url=$_SERVER['DOCUMENT_ROOT'];

require_once $url.'/QC_Han/connectdata.php';
$id=$_POST['id'];
   
    $query='delete from username where IDuser="'.$id.'"';
    $result=$conn->query($query);
    if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>