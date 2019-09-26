
<?php 
  
  
  if (empty($_POST)) {
    # code...
  }

  else {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $connection = mysqli_connect("localhost","root","","db_name");

    $sql = "SELECT * FROM tbl_users WHERE email = '$email' AND password = '$password'";

    //above query confirms if user inputs are the ones in db

    $response = mysqli_query($connection, $sql);

    // response has 0 row or i row

    $num_rows = mysqli_num_rows($response);

    if ($num_rows < 1) {
      echo "<br> Wrong credentials, Please create account";
      exit();
    }

    elseif ($num_rows > 1) { //theres a double registration

      echo "Error, Contact admin";
      exit();

    }

    elseif ($num_rows==1) 
    {//Right credentials redirect...to insertCar.php
      header("location:financepage.php");
    }

    else{
      echo "<br> Wrong Credentials. Please Create an account";
      exit();
    }







  }


 ?>
