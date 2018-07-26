<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$categoryName = $_POST['categoryName'];

	$sql = "INSERT INTO category (category_name, category_active, category_status) VALUES ('$categoryName', 1, 1)";

	if($connect->query($sql) === TRUE) {
	 	

			header('location: http://localhost/inventory/category.php');	



	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while adding the category.";
	}
	 

	$connect->close();

	echo json_encode($valid);
 
}