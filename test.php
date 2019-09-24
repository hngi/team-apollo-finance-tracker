<?php

require 'Database.php';

$db = new Database();
//any other query apart from select
if($db->query("INSERT INTO users (firstname, lastname, email,password,phone,time)
VALUES ('John3', 'Doe3', 'john@example.com','password','0906844632',1455667788);")){
	echo "Worked";
}else{
	echo "Not Working";
}

//selecting from db
$result = $db->select("SELECT * FROM users WHERE time=1455667788;");
if ($result ==0) {
	echo "No Records";
}else{
	var_dump($result);
	//this return the multi array containing array of each row
}

$db->close();
?>
