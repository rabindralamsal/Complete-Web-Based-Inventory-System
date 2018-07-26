<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	
	$product_id = $_POST["product_id"];
	$due = $_POST["due"];

	if($due > 4){
		$status = "partial";
	} else{
		$status = "completed";
		$due = 0;
	}

	$sql = "UPDATE orders SET due = '$due', payment_status = '$status' WHERE product_id = '$product_id'";
	$connect->query($sql1);

	if($connect->query($sql) === TRUE) {

	header('location: http://localhost/inventory/manageOrders.php');	

	} else {
	 	echo "Failed!";
	}
	  
}