<?php

/*
 **Design /UI/UX:
 **Frontend:
 **Backend:niyiojeyinka,UD_CHRIS

 */

$url_array = explode("/", $_SERVER['REQUEST_URI']);
//am getting the link details here and i split with "/"

$indexOfIndexPHP = array_search("route.php", $url_array);
//get position of route.php in the link incase the tester test using deep folder

//routing

if (array_key_exists($indexOfIndexPHP + 1, $url_array) && $url_array[$indexOfIndexPHP + 1] != "") {
    //if url as first parameter and the parameter is not /

    switch ($url_array[$indexOfIndexPHP + 1]) {
        case 'register':
        require_once "register.php";
        break;
        case 'signin':
            require_once "signin.php";
            break;
        case 'forgot-password':
            require_once "forgot-password.php";
            break;
        case 'reset-password':
            require_once "reset-password.php";
            break;
        case 'logout':
            require_once "logout.php";
            break;
        case 'dashboard':
            require_once "dashboard.php";
            $dashboard = new Dashboard();
           $method = $url_array[$indexOfIndexPHP + 2];

           $parameter = isset($url_array[$indexOfIndexPHP + 3]) ? $url_array[$indexOfIndexPHP + 3]: NULL;
           $dashboard->$method($parameter);
         /*modified so that /route.php/dashboard/totalExpenses/4

         will call the totalExpenses function and insert 4 as parameter 
             */
            break;
        default:
            echo "404";

    }

} else {
    //home

    echo "This Home, Direct Access Not Allowed";
}