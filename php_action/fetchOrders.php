<?php 	

require_once 'core.php';

$sql = "SELECT * from orders";
$result = $connect->query($sql);
$output = array('data' => array());

if($result->num_rows > 0) { 
$activeProduct = ""; 

 while($row = $result->fetch_array()) {

 	$output['data'][] = array( 		
 		$row[0], 
 		$row[1],
 		$row[2], 		 	
 		$row[3],
 		$row[5],
 		$row[6],
 		$row[10],
 		$row[14],
 		$row[12] 		
 		); 	
 }
}

$connect->close();

echo json_encode($output);