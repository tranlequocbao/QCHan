<?php
    // // Tạo kết nối
    // $conn = new PDO("mysql:host=localhost;dbname=qc_han", 'root', '');
     
    // // Cấu hình exception
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $servername = "10.40.12.6";
	$username = "root";
	$password = "";
	$db="qc_han";
	$conn = mysqli_connect($servername, $username, $password,$db);
?>