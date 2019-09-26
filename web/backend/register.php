<?php 
	header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Method: *");
    header('Content-Type: application/json');
 
	
	if (empty($_POST)) {
		 $data = array(
  "error" => 1,
  "errorMessage" => "Field Cannot Be Empty",
  "report"=> "emptyFields"
   );
echo json_encode($data,true);

	}

	else {

		$email = $_POST['email'];
		$surname = $_POST['surname'];
		$password = $_POST['password'];
		$confirm = $_POST['confirm'];

		if ($password!=$confirm) {
			
			 $data = array(
  "error" => 1,
  "errorMessage" => "Password not matching",
  "report"=> "passwordMisMatch"
   );
echo json_encode($data,true);
			exit();
		}

		if (strlen($password) < 8) {
			

				 $data = array(
  "error" => 1,
  "errorMessage" => "Your password is too short..8 characters minimum",
  "report"=> "passwordTooShort"
   );
echo json_encode($data,true);
exit();
		}


		
		$sql = "INSERT INTO users(email,surname,password) VALUES('$email','$surname','$password')";

		require_once "Database.php";
		$db = new Database();
     $response= $db->query($sql);
         $db->close();
		if ($response==true) {
				 $data = array(
  "error" => 0,
  "successMessage" => "Thank you..Data has been captured in database",
  "report"=> "registered"
   );
echo json_encode($data,true);
		}

		else {
			
						 $data = array(
  "error" => 1,
  "successMessage" => "Error encountered while saving your details. Retry",
  "report"=> "unknownError"
   );
echo json_encode($data,true);
		}

	}



 ?>
