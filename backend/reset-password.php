<?php
session_start();
error_reporting(0);
include('Database.php');
error_reporting(0);
$db = new Database();

if(isset($_POST['submit']))
  {
    $contactno=$_SESSION['contactno'];
    $email=$_SESSION['email'];
    $password=md5($_POST['newpassword']);
	$passconfirmation = $_POST['confirmpassword'];
	
	echo  $email;
	
   if($db->update(" UPDATE users SET password='$password' WHERE email = '$email'")){
					 $data = array(
  "error" => 0,
  "successMessage" => "Password reset sucessful",
  "report"=> "Reset Sucessful"
   );
		session_destroy();
	}else{
		$data = array(
  "error" => 1,
  "successMessage" => "Reset unsucessful ..try again",
  "report"=> "password rest failed"
   );
	}
  }
  ?>
