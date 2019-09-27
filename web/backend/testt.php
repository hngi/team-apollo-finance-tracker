<?php

            $cost =16.00;
			$item=   "Rice";
			$details= "A  ".$item;
            $time =date("Y-m-d");
            $_SESSION['userId'] = 2;
				
$sql= "INSERT INTO expense (userId,time,item,cost,details) VALUES(".$_SESSION['userId'].",'".$time."','".$item."',".$cost.",'".$details."');";

	require_once "Database.php";
	$db = new Database();
	$response = $db->query($sql);
	var_dump($response);
		var_dump($sql);

	$db->close();
	echo $time;