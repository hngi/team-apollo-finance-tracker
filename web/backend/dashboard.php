<?php
require 'Database.php';

class Dashboard {
  public $db;
  function __construct() {
		$this->db = new Database();
		session_start();
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: *");
		header("Access-Control-Allow-Method: *");
		header('Content-Type: application/json');
  }

	public function totalExpenses($id=NULL) {
		$id=$_SESSION['userId'];
		$currentDay = date("Y-m-d"); //Today
		$currentDayExpenses = $this->db->selectDashboardExpenses("SELECT SUM(cost) as expenses FROM expense WHERE userId = $id and `time` like '$currentDay%';");
		$currentMonth = date("Y-m"); //PhP current Month
		$currentMonthExpenses = $this->db->selectDashboardExpenses("SELECT SUM(cost) as expenses FROM expense WHERE userId = $id and `time` like '$currentMonth%';");
		$currentYear = date("Y"); //PHP year value
		$currentYearExpenses = $this->db->selectDashboardExpenses("SELECT SUM(cost) as expenses FROM expense WHERE userId = $id and `time` like '$currentYear%';");
		$sql= "SELECT spending_limit FROM users WHERE id = '".$_SESSION['userId']."';";
        $rows = $this->db->select($sql);
		$result = array(
			"id" => $id,
			"day" => $currentDayExpenses,
			"Month" => $currentMonthExpenses,
			"year" => $currentYearExpenses,
			"limit" => $rows[0]['spending_limit']
		);

		//this return the multi array containing array of each row
		//var_dump($month_total); or
	 echo json_encode($result);

		$this->db->close();
	}
 public function addSpendingLimit($value=NULL)
 {
  
if (isset($_SESSION['userId'])) {
      $item=   $_POST['limit'];
    
      if (!empty($_POST)) {
        $sql= "UPDATE users SET spending_limit='".$_POST['limit']."' WHERE id = '".$_SESSION['userId']."';";
        if ($this->db->query($sql)) {
          $data = array(
            "error"=> 0,
            "successMessage" => "Spending Limit Changed Successfully",
            "report" =>"spendingLimitChanged"
          ); 
          echo json_encode($data,true);
        }

        else {
          $data = array(
            "error"=>1,
            "errorMessage" => "Unknown Database Error",
            "report" =>"unknownError"
          ); 
          echo json_encode($data,true);
        }
      }

      else {
        $data = array(
          "error"=>1,
          "errorMessage" => "No Data Received by the backend",
          "report" =>"noDataReceived"
        ); 
        echo json_encode($data, true);
      }
    }

    else {
      $data = array(
        "error"=>1,
        "errorMessage" => "You are not Logged in",
        "report" =>"accountLoggedOut"
      ); 
      echo json_encode($data, true);
    }
		$this->db->close();

 }


public function getExpensesHistory($id=NULL) {


		$id=$_SESSION['userId'];
		if ($_POST['sort'] =="day") {
		$currentDay = date("Y-m-d"); //Today
$sql= "SELECT * FROM expense WHERE userId = $id and `time` like '$currentDay%';";
         }
         elseif ($_POST['sort'] =="Month") {
	   $currentMonth = date("Y-m"); //PhP current Month
       $sql= "SELECT * FROM expense WHERE userId = $id and `time` like '$currentMonth%';";
		}else{
		$currentYear = date("Y"); //PHP year value
		 $sql= "SELECT * FROM expense WHERE userId = $id and `time` like '$currentYear%';";
		}

		$rows = $this->db->select($sql);
        if ($rows != 0 ){
          $data = array(
            "error"=> 0,
            "histories" => $rows,
            "report" =>"gotHistory"
          ); 
          echo json_encode($data,true);
        }else{
		$data = array(
		            "error"=> 1,
		            "errorMessage" => "No History Yet",
		            "report" =>"noHistory"
		          ); 
		echo json_encode($data,true);

        }
       $this->db->close();
   
	}
	
	public function addExpense($id = NULL) {
			$cost = $_POST['cost'];
			$item=   $_POST['item'];
			$details= $_POST['details'];
            $time =date("Y-m-d");
			
			if (!empty($_POST)) {
$sql= "INSERT INTO expense (userId,time,item,cost,details) VALUES(".$_SESSION['userId'].",'".$time."','".$item."',".$cost.",'".$details."');";
				if ($this->db->query($sql)) {
					$data = array(
						"error"=>0,
						"successMessage" => "Expense Added Successfully",
						"report" =>"expenseSaved"
					); 
					echo json_encode($data,true);
				}

				else {
					$data = array(
						"error"=>1,
						"errorMessage" => "Unknown Database Error",
						"report" =>"unknownError"
					); 
					echo json_encode($data,true);
				}
			}

			else {
				$data = array(
          "error"=>1,
          "errorMessage" => "No Data Received by the backend",
          "report" =>"noDataReceived"
        ); 
				echo json_encode($data, true);
			}
		

	

				$this->db->close();

	}
	
	public function deleteExpense($id = NULL) {
    if (isset($_SESSION['userId'])) {
    	if ($id == NULL) {
  			$sql= "DELETE FROM expense WHERE id=".$id.";";
				if ($this->db->query($sql)) {
					$data = array(
						"error"=>0,
						"errorMessage" => "Expense Deleted Successfully",
						"report" =>"expenseDeleted"
					); 
					echo json_encode($data, true);
				}

				else {
					$data = array(
						"error"=>1,
						"errorMessage" => "Unknown Database Error",
						"report" =>"unknownError"
					); 
					echo json_encode($data, true);
				}
			}

			else {
				$data = array(
          "error"=>1,
          "errorMessage" => "No Data Received by the backend",
          "report" =>"noDataReceived"
        ); 
				echo json_encode($data, true);
			}
		}
		
		else {
			$data = array(
				"error"=>1,
				"errorMessage" => "You are not Logged in",
				"report" =>"accountLoggedOut"
			); 
			echo json_encode($data, true);
		}
				$this->db->close();

  }

}
?>

