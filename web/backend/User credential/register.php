<?php 
session_start();
error_reporting(0);
require_once "Database.php";

if(isset($_POST['submit']))
  {
	$fname=$_POST['firstname'];
	$lname=$_POST['lastname'];
	$email=$_POST['email'];
    //removed contact number, i.e $phone=$_POST['phone'];
    $password= md5($_POST['password']);

    $sqlQuery = "SELECT * FROM users WHERE email ='".$email."';";
$db = new Database();
$result = $db->select($sqlQuery);
    if(count($result) > 0){
$msg="This email  associated with another account";
    }
    else{

$query = $db->query("INSERT INTO user(firstname, lastname, email, phone, password) VALUES ('".$fname."', '".$lname."', '".$email."' , '".$password."' )");
    if ($query) {		
	$msg="You have successfully registered";
	} else
    {
      $msg="Something Went Wrong. Please try again";
	}
}
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Finance Tracker - Signup</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.repeatpassword.value)
{
alert('Password and Repeat Password field does not match');
document.signup.repeatpassword.focus();
return false;
}
return true;
} 

</script>
<body>
	<div class="row">
			<h2 text-align="center">Daily Expense Tracker</h2>
	<hr />

				<div class="panel-heading">Sign Up</div>
				<div class="panel-body">
					<form role="form" action="register.php" method="post" onsubmit="return checkpass()">
						<p style="font-size:16px; color:red" text-align="center"> <?php if($msg){ echo $msg;}  ?> </p>
						<fieldset>
							<div class="form-group">
								<input placeholder="Full Name" name="firstname" type="text" required="true">
							</div>
							<div class="form-group">
								<input placeholder="Last Name" name="lastname" type="text" required="true">
							</div>
							<div class="form-group">
								<input placeholder="E-mail" name="email" type="email" required="true">
							</div>
							<div class="form-group">
								<input placeholder="Password" name="password" type="password" value="" required="true">
							</div>
							<div class="form-group">
								<input type="password" name="repeatpassword" placeholder="Repeat Password" required="true">
							</div>
							<div class="checkbox">
								<button type="submit" value="submit" name="submit">Register</button><span>
								<a href="index.php" class="btn btn-primary">Login</a></span>
							</div>
							 </fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	

</body>
</html>
