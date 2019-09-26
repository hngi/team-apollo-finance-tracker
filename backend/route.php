<?php

/*
**Design /UI/UX: 
**Frontend:
**Backend:niyiojeyinka,

*/

$url_array =explode("/", $_SERVER['REQUEST_URI']);
//am getting the link details here and i split with "/"

$indexOfIndexPHP = array_search("api.php", $url_array);
//get position of api.php in the link incase the tester test using deep folder

//routing

if (array_key_exists($indexOfIndexPHP+1, $url_array) &&  $url_array[$indexOfIndexPHP+1] !="") {
	//if url as first parameter and the parameter is not /

	switch ( $url_array[$indexOfIndexPHP+1]) {
		   /* case 'register':
			require_once "register.php";
			break;*/
			case 'login':
			require_once "login.php";
			case 'dashboard':
			require_once "dashboard.php";
			break;
			default:
			echo "404";

	}

}else{
	//home

	echo "This Home, Direct Access Not Allowed";
}





 ?>
