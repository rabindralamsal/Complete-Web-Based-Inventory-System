<?php 	

require_once 'core.php';

$sql = "SELECT category_id, category_name, category_active, category_status FROM category WHERE category_status = 1";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 while($row = $result->fetch_array()) {
 	$categoryId = $row[0];

 	if($row[2] == 1) {

 		$activeCategory = "<label class='label label-success'>On Going</label>";
 	} else {

 		$activeCategory = "<label class='label label-danger'>Stopped</label>";
 	}


 	$output['data'][] = array( 
 		$row[0],		
 		$row[1], 
 		$activeCategory,
 		); 	
 }

}
$connect->close();

echo json_encode($output);