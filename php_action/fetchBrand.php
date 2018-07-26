<?php 	

require_once 'core.php';

$sql = "SELECT brand_id, brand_name, brand_active, brand_status FROM brands WHERE brand_status = 1";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $activeBrands = ""; 

 while($row = $result->fetch_array()) {
 	$brandId = $row[0];

 	if($row[2] == 1) {

 		$activeBrands = "<label class='label label-success'>On Going</label>";
 	} else {

 		$activeBrands = "<label class='label label-danger'>Stopped</label>";
 	}

 	$button1 = '<a type="button" data-toggle="modal" data-target="#editBrandModel" onclick="editBrands('.$brandId.')">Edit</a>';

	$button2 = '<a type="button" data-toggle="modal" data-target="#removeBrandModal" onclick="removeBrands('.$brandId.')">Remove</a>';

 	$output['data'][] = array( 	
 		$row[0],	
 		$row[1],
 		$activeBrands,		
 		$button1,
 		$button2
 		); 	
 }
}

$connect->close();

echo json_encode($output);