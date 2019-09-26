<?php
session_start();
error_reporting(0);
require_once "Database.php";
error_reporting(0);

if(isset($_POST['submit']))
  {
  	$db = new Database();
    //removed $contactno=$_SESSION['contactno'];
    $email=$_SESSION['email'];
    $password=md5($_POST['newpassword']);
$sqlQuery =  "UPDATE users SET password ='".$password."'  WHERE  email ='".$email."' ";
        
   if($db->query($sqlQuery))
   {
echo "<script>alert('Password successfully changed');</script>";
session_destroy();
   }else{
   	echo "<script>alert('Error Occured');</script>";
   }
  
  }
  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Finance Tracker - Forgot Reset</title>

	<script type="text/javascript">
		function checkpass()
		{
			if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
			{
				alert('New Password and Confirm Password field does not match');
				document.changepassword.confirmpassword.focus();
				return false;
			}
			return true;
		} 

</script>
</head>
<body>
	<div class="row">
			<h2 align="center">Finance Tracker</h2>
	<hr />
				<div class="panel-heading">Reset Password</div>
				<div class="panel-body">
					<p style="font-size:16px; color:red" align="center"> <?php if($msg){ echo $msg;}  ?> </p>
					<form role="form" action="reset-password.php" method="post" name="changepassword" onsubmit="return checkpass()">
						<fieldset>
							<div class="form-group">
								<input placeholder="Password" name="newpassword" type="password" value="" required="true">
							</div>
							
							<div class="form-group">
								<input  placeholder="Confirm Password" name="confirmpassword" type="password" value="" required="true">
							</div>
							<div class="checkbox">
								<button type="submit" value="" name="submit" class="btn btn-primary">Reset</button><span><a href="index.php" class="btn btn-primary">Login</a></span>

							</div>
						
							</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
</body>
</html>
