<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	
	$order_date = $_POST["date"];
	$client_name = $_POST["name"];
	$client_contact = $_POST["contact"];
	$product_id = $_POST["product_id"];
	$product_name =  $_POST["product_name"];
	$sub_total = $_POST["subTotal"];
	$vat = $_POST["vat"];
	$discount = $_POST["discounted"];
	$total_amount = $_POST["total"];
	$paid = $_POST["paid"];
	$due = $_POST["due"];
	$payment_type = $_POST["paymentType"];
	$numberOfItems = $_POST["numberOfItems"];

	if ($due < 5) {
		$payment_status = "completed";
		$due = 0;
	} else{
		$payment_status = "partial";
	}

	$sql = "INSERT INTO orders (
	 order_date,
	 client_name,
	 client_contact,
	 product_id,
	 product_name,
	 noOfProducts,
	 sub_total,
	 vat,
	 discount,
	 total_amount, 
	 paid, 
	 due, 
	 payment_type, 
	 payment_status)
	 VALUES (
	 '$order_date', 
	 '$client_name', 
	 '$client_contact', 
	 '$product_id', 
	 '$product_name',
	 '$numberOfItems', 
	 '$sub_total', 
	 '$vat', 
	 '$discount', 
	 '$total_amount', 
	 '$paid', 
	 '$due', 
	 '$payment_type',
	 '$payment_status')";

	if($connect->query($sql) === TRUE) {


                      $quant = "SELECT * FROM product WHERE product_id = '$product_id'";
                      $quantUpdate = $connect->query($quant);
                      $row = $quantUpdate->fetch_array();
                      $dataFromTable = $row['quantity'];
                      $newquantity = $dataFromTable - $numberOfItems;

                      $update = "UPDATE product SET quantity = '$newquantity' where product_id = '$product_id'";
                      $connect->query($update);

	header('location: http://localhost/inventory/manageOrders.php');	

	} else {
	 	echo "Failed!";
	}
	  
}