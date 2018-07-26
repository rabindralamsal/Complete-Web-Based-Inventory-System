<?php 

require_once 'core.php';

if($_POST) {


	$valid['success'] = array('success' => false, 'messages' => array());

	$currentPassword = md5($_POST['password']);
	$nPassword = md5($_POST['npassword']);
	$cPassword = md5($_POST['cpassword']);
	$userId = $_POST['user_id'];

	$sql ="SELECT * FROM users WHERE user_id = {$userId}";
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();

	if($currentPassword == $result['password']) {

		if($nPassword == $cPassword) {

			$updateSql = "UPDATE users SET password = '$nPassword' WHERE user_id = {$userId}";
			if($connect->query($updateSql) === TRUE) {
				
					header('location: http://localhost/inventory/logout.php');	

			}
		} else{

					header('location: http://localhost/inventory/php_action/passwordVerificationError.php');	

			}

	} else{

					header('location: http://localhost/inventory/php_action/currentPasswordError.php');	

			}

	$connect->close();
}
?>