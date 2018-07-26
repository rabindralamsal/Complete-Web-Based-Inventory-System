<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$brand_name = $_POST['brand_name'];
 	$brand_status = $_POST['brand_status'];
 	$brand_id = $_POST['brand_id'];

	$sql = "UPDATE brands SET brand_name = '$brand_name', brand_active = '$brand_status' WHERE brand_id = '$brand_id'";

	if($connect->query($sql) === TRUE) {
	 	
		header('location: http://localhost/inventory/brand.php');	


	} else {
	 	
		echo 'Failed!';

	}
	 
	$connect->close();
}