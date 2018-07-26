<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$category_name = $_POST['category_name'];
 	$category_status = $_POST['category_status'];
 	$category_id = $_POST['category_id'];

	$sql = "UPDATE category SET category_name = '$category_name', category_active = '$category_status' WHERE category_id = '$category_id'";

	if($connect->query($sql) === TRUE) {
	 	
		header('location: http://localhost/inventory/category.php');	


	} else {
	 	
		echo 'Failed!';

	}
	 
	$connect->close();
}