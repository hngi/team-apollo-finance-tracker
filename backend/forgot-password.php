<?php
session_start();
error_reporting(0);
include('Database.php');

$db = new Database();

if(isset($_POST['submit']))
  {
    $email=$_POST['email'];

   if($db->select ("SELECT email FROM users WHERE email='$email'")){
		  $_SESSION['email']=$email;
     header('location:reset-password.php');
	}
    else{
      			 $data = array(
  "error" => 1,
  "successMessage" => "invalid details try again",
  "report"=> "registered"
   );
    }
  }
  ?>
