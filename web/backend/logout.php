<?php
session_start();
session_unset();
session_destroy();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Method: *");
header('Content-Type: application/json');

$data = array(
	"error"=>0,
	"successMessage" => "User Logged Out Successfully",
	"report"=>"loggedOut"
);

echo json_encode($data,true);

function log_out_user() {
	unset($_SESSION['user_id']);
	unset($_SESSION['last_login']);
	unset($_SESSION['email']);
	return true;
}

log_out_user();

redirect_to(url_for('login.php'));
?>

