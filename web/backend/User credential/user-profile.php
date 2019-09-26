<?php
session_start();
error_reporting(0);
require_once "Database.php";

if (strlen($_SESSION['trackeruid']==0)) {
  header('location:logout.php');
  } 
  else{
    if(isset($_POST['submit']))
  {
    $userid=$_SESSION['trackeruid'];
    $email = $_SESSION['email'];

    //removed $fullname=$_POST['fullname'];
    //removed $phone=$_POST['contactnumber'];
      $db = new Database();
      $query= $db->query("UPDATE users SET firstname ='".$firstname."', lastname ='".$lastname."', WHERE id ='".$userid."'");
      $db->close();
    if ($query) {
    $msg="User profile has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again.";
    }
  }
}
  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Finance Tracker || User Profile</title>

</head>
<body>
<h2>Profile</h2>
<div>
  <div>Profile</div>
  <div>
  <p style="color:red" text-align="center"> <?php if($msg){
    echo $msg; }?> </p>
  <div>
     <?php
     $userid=$_SESSION['trackeruid'];
         $ret=mysqli_query($conn,"SELECT * FROM user WHERE  id='$userid'");
         $cnt=1;
         while ($row=mysqli_fetch_array($ret)) { ?>
          <form role="form" method="post" action="user-profile.php">
            <div class="form-group">
              <label>First Name</label>
              <input type="text" value="<?php  echo $row['firstname'];?>" name="firstname" required="true">
            </div>

            <div class="form-group">
              <label>Last Name</label>
              <input type="text" value="<?php  echo $row['lastname'];?>" name="lastname" required="true">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" value="<?php  echo $row['email'];?>" required="true" readonly="true">
            </div>

            <div>
            <div>
              <label>Registration Date</label>
              <input name="time" type="text" value="<?php  echo $row['time'];?>" readonly="true">
            </div>

            <div>
              <button type="submit" class="btn btn-primary" name="submit">Update</button>
            </div>


          </div>
         <?php } ?>
              </form>
            </div>
          </div>
        </div><!-- /.panel-->
      </div><!-- /.col-->

    </div><!-- /.row -->
  </div><!--/.main-->
  

</body>
</html>
