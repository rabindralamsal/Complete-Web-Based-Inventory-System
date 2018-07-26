<?php require_once 'includes/header.php'; ?>

<?php 
$user_id = $_SESSION['userId'];
$sql = "SELECT * FROM users WHERE user_id = {$user_id}";
$query = $connect->query($sql);
$result = $query->fetch_assoc();

$connect->close();
?>

<div class="row">
	<div class="col-md-12">

		<div class="panel panel-success">
			<div class="panel-heading">
				<div class="page-heading">Change username / password</div>
			</div>

			<div class="panel-body">

				
				<div id="usernameForm">
				<form action="php_action/changeUsername.php" method="post" class="form-horizontal" id="changeUsernameForm">
					<fieldset>
						<b>Change Username</b><hr style="margin-top:5px;">

						<div class="changeUsernameMessages"></div>			

						<div class="form-group">
					    <label for="username" class="col-sm-2 control-label">New Username</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="username" name="username" value="<?php echo $result['username']; ?>" required/>
					    </div>
					  </div>

					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					    	<input type="hidden" name="user_id" id="user_id" value="<?php echo $result['user_id'] ?>" /> 
					      <button type="submit" class="btn btn-success" data-loading-text="Loading..." id="changeUsernameBtn">Update username</button>
					    </div>
					  </div>
					</fieldset>
				</form>
				</div>


				<div id="passwordForm">

				<form action="php_action/changePassword.php" method="post" class="form-horizontal" id="changePasswordForm">
					<fieldset>
						<b>Change Password</b><hr style="margin-top:5px;">

						<div class="changePasswordMessages"></div>

						<div class="form-group">
					    <label for="password" class="col-sm-2 control-label">Current Password</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="password" name="password" placeholder="Current Password" required>
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="npassword" class="col-sm-2 control-label">New password</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="npassword" name="npassword" placeholder="New Password" required>
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="cpassword" class="col-sm-2 control-label">Confirm Password</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" required>
					    </div>
					  </div>

					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					    	<input type="hidden" name="user_id" id="user_id" value="<?php echo $result['user_id'] ?>" /> 
					      <button type="submit" class="btn btn-success">Update password</button>
					      
					    </div>
					  </div>


					</fieldset>
				</form>
			</div>
			</div>	

		</div>	
	</div>	
</div>


<script type="text/javascript">
$(document).ready(function(){

	$("#topNavSetting").addClass('active');
});
</script>
<?php require_once 'includes/footer.php'; ?>