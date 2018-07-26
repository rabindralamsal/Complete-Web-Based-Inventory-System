<?php 	

require_once 'core.php';

$sql = "SELECT product.product_id, product.product_name, product.brand_id,
 		product.category_id, product.quantity, product.rate, product.active, product.status, 
 		brands.brand_name, category.category_name FROM product 
		INNER JOIN brands ON product.brand_id = brands.brand_id 
		INNER JOIN category ON product.category_id = category.category_id";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

$activeProduct = ""; 

 while($row = $result->fetch_array()) {
 	$productId = $row[0];

 	if($row[4] >= 1) {
 		$activeProduct = "<label class='label label-success'>Available</label>";
 	} else {
 		$activeProduct = "<label class='label label-danger'>Not Available</label>";
 	}

	$brand = $row[8];
	$category = $row[9];

 	$output['data'][] = array( 		
 		$row[0],
 		$row[1], 
 		$row[5],
 		$row[4], 		 	
 		$brand,
 		$category,
 		$activeProduct,		
 		); 	
 }
}

$connect->close();

echo json_encode($output);