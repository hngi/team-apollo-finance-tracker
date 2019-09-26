<?php
session_start();
error_reporting(0);
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Method: *");
header('Content-Type: application/json');
require_once "Database.php";

if(isset($_POST['submit'])) {
	$db = new Database();

	$email = $_SESSION['email'];
	$password = md5($_POST['newpassword']);
	$sqlQuery = "UPDATE users SET password ='".$password."'  WHERE  email ='".$email."' ";

  if($db->query($sqlQuery)) {
    $data = array(
			"error"=>0,
			"successMessage" => "Password successfully changed",
			"report"=>"passwordChanged"
		);
		echo json_encode($data,true);
		session_destroy();
	}
	else {
   	$data = array(
			"error"=>1,
			"errorMessage" => "Error Occurred",
			"report"=>"unknownError"
		);
		echo json_encode($data,true);
  }
}
?>
