<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	
	$product_id = $_POST["product_id"];
	$numberOfItems = $_POST["noOfProducts"];
	$order_id = $_POST["order_id"];


      $query = "SELECT quantity FROM product WHERE product_id = '$product_id'";
      $result = $connect->query($query);
      $row = $result->fetch_array();
      $quantityInDatabase = $row[0];
      $afterRemoval = $quantityInDatabase + $numberOfItems;



	$sql1 = "UPDATE product SET quantity = '$afterRemoval' WHERE product_id = '$product_id'";
	$connect->query($sql1);

	$sql2 = "DELETE from orders where order_id = '$order_id'";


	if($connect->query($sql2) === TRUE) {

	header('location: http://localhost/inventory/manageOrders.php');	

	} else {
	 	echo "Failed!";
	}
	  
}