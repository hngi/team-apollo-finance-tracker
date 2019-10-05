<?php
$email = "ola@gmail.com";
	$fullname = "Philip";
	$password = md5("test");
	$confirm = md5("test");
	$spending_limit = 00.00;
            $time =date("Y-m-d");
$sql = "INSERT INTO users(email,fullname,password,spending_limit,time) VALUES('$email','$fullname','$password',$spending_limit,'$time')";
	require_once "Database.php";
	$db = new Database();
	$response = $db->query($sql);
	$db->close();
	echo $time;