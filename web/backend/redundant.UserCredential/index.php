<?php

session_start();
error_reporting(0);
require_once "Database.php";


if(isset($_POST['login']))
  {
    $email = $_POST['email'];
	$password = md5($_POST['password']);
	$sql = "SELECT * FROM users WHERE email = '".$email."' && password = '".$password."'";
	$db = new Database();
	$result= $db->select($sql);
	
    if($result == 0){
          $msg="Invalid Details.";
    }
    else{
    $_SESSION['trackeruid']=$result['id'];
     header('location:dashboard.php');
	}
  }


  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Finance Tracker - Login</title>

	
</head>
<body>

	<div class="row">
			<h2 text-align="center">Finance Tracker</h2>
	<hr />

				<div class="panel-heading">Log in</div>
				<div >
					<p style="font-size:16px; color:red" text-align="center"> <?php if($msg){ echo $msg;}  ?> </p>
					<form role="form" action="index.php" method="post" onsubmit="return checkpass()">
						<fieldset>
							<div class="form-group">
								<input placeholder="E-mail" name="email" type="email" value="" required="true">
							</div>
							<a href="forgot-password.php">Forgot Password?</a>
							<div class="form-group">
								<input placeholder="Password" name="password" type="password" value="" required="true">
							</div>
							<div class="checkbox">
								<button type="submit" value="login" name="login" class="btn btn-primary">login</button><span>
								<a href="register.php" class="btn btn-primary">Register</a></span>
							</div>
							</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

</body>
</html>
