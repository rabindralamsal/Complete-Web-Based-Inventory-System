<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$product_id = $_POST['product_id'];
 	$product_name = $_POST['product_name'];
 	$quantity = $_POST['quantity'];
 	$rate = $_POST['rate'];

	$sql = "UPDATE product SET product_name = '$product_name', quantity = '$quantity', rate = '$rate' WHERE product_id = '$product_id'";

	if($connect->query($sql) === TRUE) {
	 	
		header('location: http://localhost/inventory/product.php');	


	} else {
	 	
		echo 'Failed!';

	}
	 
	$connect->close();
}