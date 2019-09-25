
<?php

require 'Database.php';
$db = new Database();
	if (empty($_POST)) {
		# code...
	}

	else {

		$email = $_POST['email'];
		$surname = $_POST['surname'];
		$password = $_POST['password'];
		$confirm = $_POST['confirm'];

		if ($password!=$confirm) {
			echo "Password entries do not match. Please check.";
			exit();
		}

		if (strlen($password) < 8) {
			echo "Your password is too short. Please use 8 characters minimum.";
		}

		$response = $db->query("INSERT INTO tbl_users(email,fullname,password)VALUES('$email','$fullname','$password')");

		if ($response==true) {
			echo "Thank you. Your data has been captured in the database.";
		}

		else {
			echo "Error encountered while saving your details. Retry";
		}

	}






 ?>
