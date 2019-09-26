<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Method: *");
header('Content-Type: application/json');

$email = $_POST['email'];
$password = $_POST['password'];

require_once "Database.php";
$db = new Database();

//selecting from db
$users = $db->select("SELECT * FROM users WHERE email ='".$email."';");
if ($users == 0) {
	$data = array (
		"error"=>1,
		"errorMessage" => "Either Email is Incorrect or Account Not Exists",
		"report" =>"accountNotExists"
	); 
	echo json_encode($data,true);
}
else {
	if ($users[0]['password'] == $password) {
		echo json_encode($users[0], true);
	}
	else {
		$data = array (
			"error"=>1,
			"errorMessage" => "Incorrect Password",
			"report"=>"incorrectLoginDetails"
		);
		echo json_encode($data, true);
	}
}

$db->close();
?>




