<?php
 

require 'Database.php';

class Dashboard
{
    public $db;
   function __construct()
   {
       $this->db =new Database();
       session_start();
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Method: *");
  header('Content-Type: application/json');
   }


    public function totalExpenses($id)
    {

        $currentDay         = date("Y-m-d"); //Today
        $currentDayExpenses = $this->db->selectDashboardExpenses("SELECT SUM(cost) as expenses FROM expense WHERE userId = $id and `time` like '$currentDay%';");

        $currentMonth = date("Y-m"); //PhP current Month

        $currentMonthExpenses = $this->db->selectDashboardExpenses("SELECT SUM(cost) as expenses FROM expense WHERE userId = $id and `time` like '$currentMonth%';");

        $currentYear = date("Y"); //PHP year value

        $currentYearExpenses = $this->db->selectDashboardExpenses("SELECT SUM(cost) as expenses FROM expense WHERE userId = $id and `time` like '$currentYear%';");

        $result = array("id" => $id,
            "day"                => $currentDayExpenses,
            "month"              => $currentMonthExpenses,
            "year"               => $currentYearExpenses,
        );

        //this return the multi array containing array of each row
        //var_dump($month_total); or
       // return json_encode($result);

        $this->db->close();
    }


   public function addExpense($id=NULL)
   {
       if (isset($_SESSION['userId'])) {
     $cost = $_POST['cost'];
     $item=   $_POST['item'];
     $details= $_POST['details'];
     $time = time();
if (!empty($_POST)) {
   

$sql= "INSERT INTO expenses(userId,time,item,cost,details) VALUES(".$_SESSION['userId'].",".$time.",".$cost.",".$details.");";

       if($this->db->query($sql))
       {
        $data = array(
              "error"=>0,
              "errorMessage" => "Expense Added Successfully",
              "report" =>"expenseSaved"
            ); 


        echo json_encode($data,true);

       }else{
$data = array(
          "error"=>1,
          "errorMessage" => "Unknown Database Error",
          "report" =>"unknownError"
        ); 


  echo json_encode($data,true);

       }
   }else{
$data = array(
          "error"=>1,
          "errorMessage" => "No Data Received by the backend",
          "report" =>"noDataReceived"
        ); 


  echo json_encode($data,true);

   }

       }else{

$data = array(
          "error"=>1,
          "errorMessage" => "You are not Logged in",
          "report" =>"accountLoggedOut"
        ); 


  echo json_encode($data,true);

       }
   }

 public function deleteExpense($id=NULL)
   {
       if (isset($_SESSION['userId'])) {
    
if ($id == NULL){
   

$sql= "DELETE FROM expenses WHERE id=".$id.";";

       if($this->db->query($sql))
       {
        $data = array(
              "error"=>0,
              "errorMessage" => "Expense Deleted Successfully",
              "report" =>"expenseDeleted"
            ); 


        echo json_encode($data,true);

       }else{
$data = array(
          "error"=>1,
          "errorMessage" => "Unknown Database Error",
          "report" =>"unknownError"
        ); 


  echo json_encode($data,true);

       }
   }else{
$data = array(
          "error"=>1,
          "errorMessage" => "No Data Received by the backend",
          "report" =>"noDataReceived"
        ); 


  echo json_encode($data,true);

   }

       }else{

$data = array(
          "error"=>1,
          "errorMessage" => "You are not Logged in",
          "report" =>"accountLoggedOut"
        ); 


  echo json_encode($data,true);

       }
   }


}

