<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>USER REGISTRATION</title>
</head>
<body>
	<h1 class="jumbotron alert alert-info">User Registration</h1>
	<p>Please Fill Your User Details Below.</p>
	<!-- user_id(Auto),email(Unique), username, password, confirm, role, saved_date(timestamp) (You don't save password and confirm in the table)-->
	<!-- create table tbl_users -->
	<!-- create a form and save the record -->
	<form method="POST">
		<input type="email" name="email" placeholder="enter your email"><br><br>
		<input type="text" name="surname" placeholder="enter your surname"><br><br>
		<input type="password" name="password" placeholder="enter your password"><br><br>
		<input type="password" name="confirm" placeholder="confirm your password"><br><br>

		<input type="submit" name="submit">

	</form><br>

	<p>Already registered? 	<a href="index.php">Login Here</a></p>
	<!-- create login.php and a form with email and password -->

</body>
</html>

<?php 
	
	
	if (empty($_POST)) {
		# code...
	}

	else {

		$email = $_POST['email'];
		$surname = $_POST['surname'];
		$password = $_POST['password'];
		$confirm = $_POST['confirm'];

		if ($password!=$confirm) {
			echo "Password not matching";
			exit();
		}

		if (strlen($password) < 8) {
			echo "Your password is too short..8 characters minimum";
		}


		$connection = mysqli_connect("localhost","root","","db_name");

		$sql = "INSERT INTO tbl_users(email,surname,password)VALUES('$email','$surname','$password')";


		$response = mysqli_query($connection, $sql);

		if ($response==true) {
			echo "Thank you..Data has been captured in database";
		}

		else {
			echo "Error encountered while saving your details. Retry";
		}

	}






 ?>
