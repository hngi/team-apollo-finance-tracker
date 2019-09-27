<?php
session_start();
require_once "Database.php";
	$db = new Database();
	$msg = '';

//Update Profile
if(isset($_POST['submit']))
{
	$fullname = $_POST['fullname'];
	$email1 = $_POST['email'];

	$update = $db->query("UPDATE users SET fullname ='".$fullname."', email='".$email1."' WHERE id =". $_SESSION['userId']);
	if ($update) {
		$msg = "<p style='background-color: green; color: white'> Profile updated Successfully...</p>";
		/*$data = array(
			"error"=>0,
			"Message" => "Profile Updated Sucessfully",
			"report" =>"updateSuccessful"
		); 
		echo json_encode($data,true);*/
	}else{
		$msg = "<p style='background-color: red; color: white'> Profile updated Successfully...</p>";
		/*$data = array (
			"error"=>1,
			"errorMessage" => "Error Updating Profile",
			"report" =>"profileUpdateError"
		); 
		echo json_encode($data,true);*/
	}
}

//selecting from db
	$user = $db->select("SELECT * FROM users WHERE id =". $_SESSION['userId']);
	if ($user) {
        $name = $user[0]['fullname'];
        $email = $user[0]['email'];
	}

	
$db->close();
?>