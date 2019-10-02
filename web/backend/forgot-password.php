<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Method: *");
header('Content-Type: application/json');
error_reporting(0);

require_once "Database.php";
$db = new Database();

  $email=$_POST['email'];
	$sqlQuery = "SELECT *  FROM users WHERE email ='".$email."'";
	$result = $db->select($sqlQuery);
	$db->close();
	$result = $result[0];
	
	if($result == 0) {
		$data = array(
			"error"=>1,
			"errorMessage" => "Invalid details, please try again",
			"report"=>"invalidDetails"
		);
		echo json_encode($data,true);
	}
	
  else {
    $_SESSION['email']=$email;
    $data = array(
			"error"=>0,
			"successMessage" => "Email is Correct",
			"report"=>"correctEmail"
		);
		echo json_encode($data,true);
  }

?>
