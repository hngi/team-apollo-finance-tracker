<?php
session_start();
error_reporting(0);
include('Database.php');
if (strlen($_SESSION['trackeruid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $userid=$_SESSION['trackeruid'];
    $fullname=$_POST['fullname'];
  $phone=$_POST['contactnumber'];

     $query=mysqli_query($conn, "UPDATE users SET firstname ='$firstname', phone ='$phone' WHERE id ='$userid'");
    if ($query) {
    $msg="User profile has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again.";
    }
  }
  ?>

