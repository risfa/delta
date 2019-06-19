<?php


include "dbconnect.php";


if (isset($_POST['ip'])) {
 	$ip = $_POST['ip'];
 	$country_name = $_POST['country_name'];
 	$city = $_POST['city'];
 	$date = date('Y-m-d h:i:j');
 	$query = "insert into ip set ip = '$ip', id = null,city = '$city',country_name = '$country_name',vote_date = '$date' ";
 if ($sql = mysql_query($query)) {
 		$response=array(
				'status' => 1,
				'status_message' =>'Product Added Successfully.'
			);

 	}else{
 		$response=array(
				'status' => 0,
				'status_message' =>'Product Addition Failed.'
			);
 	}

 	header('Content-Type: application/json');
		echo json_encode($response);

 } 


?>