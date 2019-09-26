
<?php 
  session_start();
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

   

require_once "Database.php";
$db = new Database();

//selecting from db
$users = $db->select("SELECT * FROM users WHERE email ='".$email."';");
if ($users ==0) {
   $data = array(
          "error"=>1,
          "errorMessage" => "Either Email is Incorrect or Account Not Exists",
          "report" =>"accountNotExists"
        ); 


  echo json_encode($data,true);
}else{
  if ($users[0]['password'] == $password) {
       $_SESSION['userId']= $users[0]['id'];
      echo json_encode($users[0],true);

  }else{

$data = array(
    "error"=>1,
    "errorMessage" => "Incorrect Password",
    "report"=>"incorrectLoginDetails"
  );


  echo json_encode($data,true);
  }
}

$db->close();




  }


 ?>
