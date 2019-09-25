
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
