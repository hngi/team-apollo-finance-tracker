<?php
session_start();
error_reporting(0);
require_once "Database.php";

$db = new Database();
if(isset($_POST['submit']))
  {
    //removed $contactno=$_POST['contactno'];
    $email=$_POST['email'];
$sqlQuery = "SELECT id  FROM users WHERE email ='".$email."'";
    $result = $db->select($sqlQuery);
    $db->close();
    $result = $result[0];

    if($result == 0){
        $msg="Invalid Details. Please try again.";
    }
    else{
      $_SESSION['email']=$email;
     header('location:reset-password.php');
    }

  }
  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Finance Tracker - Forgot Password</title>
	
</head>
<body>
	<div class="row">
			<h2 align="center">Finance Tracker</h2>
	<hr />

				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<p style="font-size:16px; color:red" align="center"> <?php if($msg){echo $msg; }  ?> </p>
					<form role="form" action="forgot-password.php" method="post" id="" name="login" onsubmit="return checkpass()">
						<fieldset>
							<div class="form-group">
								<input placeholder="E-mail" name="email" type="email" autofocus="" required="true">
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
