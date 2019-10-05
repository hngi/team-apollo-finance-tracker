<?php 
if (empty($_POST)) {
	$data = array(
		"error" => 1,
		"errorMessage" => "Field Cannot Be Empty",
		"report"=> "emptyFields"
   );
	echo json_encode($data,true);
}else{
require_once "Database.php";
$email = $_POST['email'];
	$fullname = $_POST['fullname'];
	$password = $_POST['password'];
	$confirm = $_POST['confirm'];
    $time =date("Y-m-d");


$db = new Database();

	//selecting from db
	$users = $db->select("SELECT * FROM users WHERE email ='".$email."';");
	if ($users != 0) {
		$data = array(
			"error"=>1,
			"errorMessage" => "Another Account is using this Email ",
			"report" =>"emailExists"
		); 
		echo json_encode($data,true);
		$db->close();
		exit();
	}



if (md5($password) != md5($confirm)){
		$data = array(
			"error" => 1,
			"errorMessage" => "Password not matching",
			"report"=> "passwordMisMatch"
   	);
		echo json_encode($data,true);

	}else if (strlen($password) < 5) {
		$data = array(
			"error" => 1,
			"errorMessage" => "Your password is too short..8 characters minimum",
			"report"=> "passwordTooShort"
   	);
		echo json_encode($data,true);
	}else{
    $password = md5($password);
	$sql = "INSERT INTO users(email,fullname,password,time,spending_limit) VALUES('$email','$fullname','$password','$time',0.00)";
	
	$db = new Database();
	$response = $db->query($sql);
	$db->close(); 
	if ($response) {
		
$data = array(
			"error" => 0,
			"successMessage" => "Thank you..Data has been captured in database",
			"report"=> "registered"
   	);
		echo json_encode($data,true);
exit();
}


}

}
	


