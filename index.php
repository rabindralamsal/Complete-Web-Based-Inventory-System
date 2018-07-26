<?php

require_once "php_action/db_connect.php";

session_start();

if(isset($_SESSION['userId'])){
	header('location: dashboard.php');
}


$errors = array();

if($_POST) {		

	$username = $_POST['username'];
	$password = $_POST['password'];

	if(empty($username) || empty($password)) {
		if($username == "") {
			$errors[] = "Username is required";
		} 

		if($password == "") {
			$errors[] = "Password is required";
		}
	} else {
		$sql = "SELECT * FROM users WHERE username = '$username'";
		$result = $connect->query($sql);

		if($result->num_rows == 1) {
			$password = md5($password);
			// exists
			$mainSql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
			$mainResult = $connect->query($mainSql);

			if($mainResult->num_rows == 1) {
				$value = $mainResult->fetch_assoc();
				$user_id = $value['user_id'];


				$_SESSION['userId'] = $user_id;
				header('location: dashboard.php');	
			} else{
				
				$errors[] = "Incorrect username/password.";
			}
		} else {		
			$errors[] = "Username does not exist!";		
		}
	}	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Inventory Management System</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">	
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="custom/css/custom.css">
	<script type="text/javascript" src="assets/jquery/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/jquery-ui/jquery-ui.min.css">
	<script type="text/javascript" src="assets/jquery-ui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>

	<style type="text/css">
		.panel-body {
    padding: 15px 15px 0px;
}
	</style>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="welcome">
			<h1>Reliance Store | JNU Branch</h1>
			<h4>Inventory Management System</h4>
		</div>
			<div class="col-md-5" style="left: 30%;position: relative;margin-top: 8%;">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title">Sign in</h3></div>
				  		<div class="panel-body">
				  			<div class="message">
				  				<?php if($errors) {
								foreach ($errors as $key => $value) {
									echo '<div class="alert alert-danger" role="alert">
									'.$value.'</div>';										
									}
								} ?>			  				
				  			</div>

				    		<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="loginForm">
							  <div class="form-group">
							    <label class="control-label col-sm-3" for="username">Username:</label>
							    <div class="col-sm-9">
							      <input type="text" class="form-control" id="username" name="username" placeholder="Username">
							    </div>
							  </div>
							  <div class="form-group">
							    <label class="control-label col-sm-3" for="password">Password:</label>
							    <div class="col-sm-9"> 
							      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
							    </div>
							  </div>
							  <div class="form-group"> 
							    <div class="col-sm-offset-3 col-sm-9">
							      <button type="submit" class="btn btn-default">Login</button>
							    </div>
							  </div>
							</form>	

				  		</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>