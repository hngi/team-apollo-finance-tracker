<?php 
session_start();
error_reporting(0);
include('Database.php');

$db = new Database();

if(isset($_POST['submit']))
  {
	$fullname=$_POST['fullname'];
	$email=$_POST['email'];
	$password= $_POST['password'];
    $password2=$_POST['password2'];
    
	if($db->select ("SELECT email FROM users WHERE email='$email'")){
				 $data = array(
  "error" => 1,
  "errorMessage" => "email already taken",
  "report"=> "Email in use already"
   )
		
	}else if(strlen($password) < 8) {
					 $data = array(
  "error" => 1,
  "errorMessage" => "password must be more than 7",
  "report"=> "passwordTooShort"
   );
	
	}else if($password != $password2){
					 $data = array(
  "error" => 1,
  "errorMessage" => "passwords do not match",
  "report"=> "passwordmissmatch"
   );
	}
	else{  
	$passHash = md5($password);
	if($db->query("INSERT INTO users (fullname, email,password)VALUES ('$fullname', '$email','$passHash');")){
				 $data = array(
  "error" => 0,
  "successMessage" => "Registration sucessful",
  "report"=> "registered"
   );
}else{
				 $data = array(
  "error" => 1,
  "successMessage" => "Not registered try again ",
  "report"=> "registration unsucessful"
   );
}}
	
  
}

?>
