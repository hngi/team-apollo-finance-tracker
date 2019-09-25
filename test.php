<?php

require 'Database.php';

$db = new Database();
//any other query apart from select
$test_insert_query = $db->query("INSERT INTO users (fullname,password,email,time)
VALUES ('John Doe3','password','john@example.com', 1455667788)");
if($test_insert_query){
	echo "Worked!<br/>";
}else{
	echo "Not Working";
}

//selecting from db
$result = $db->select("SELECT * FROM users");
if ($result ==0) {
	echo "No Records.<br/>";
}else{
	var_dump($result);
	//this return the multi array containing array of each row
}

$db->close();
?>
