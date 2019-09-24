<?php

require 'Database.php';

$db = new Database();
if($db->query("INSERT INTO users (firstname, lastname, email,password,phone,time)
VALUES ('John', 'Doe', 'john@example.com','password','0906844632',1455667788);")){
	echo "Worked";
}else{
	echo "Not Working";
}


?>
