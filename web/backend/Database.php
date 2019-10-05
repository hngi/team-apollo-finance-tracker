<?php
/**
 * @Description: This handles the database connection
 * and server as a mini query builder
 */
class Database {
	public $conn;
	public function __construct() {
		$url = "mysql://jpq841kbg8gze4bg:licm3p4nty76w6oo@mna97msstjnkkp7h.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/spzgy3k82bs0ecb6";
		$dbparts = parse_url($url);
		
		$hostname = $dbparts['host'];
		$username = $dbparts['user'];
		$password = $dbparts['pass'];
		$database = ltrim($dbparts['path'],'/');


		// Create connection
		$this->conn = new mysqli($hostname, $username, $password, $database);

		// Check connection
		if ($this->conn->connect_error) {
			die("Connection failed: " . $this->conn->connect_error);
		}
		//echo "Connection was successfully established!";
  }
	
	public function query($sql) {
		if ($this->conn->query($sql) === true) {
			return true;
		}
		return false;
	}

  public function select($sql) {
		$result = $this->conn->query($sql);

		if ($result->num_rows > 0) {
			$resultToReturn = [];
			while ($row = $result->fetch_assoc()) {
				array_push($resultToReturn, $row);
			}
			return $resultToReturn;
		}
		return 0;
	}
		
  public function selectDashboardExpenses($sql) {
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			$resultToReturn = [];
			while ($row = $result->fetch_assoc()) {
				array_push($resultToReturn, $row);
			}
			return $resultToReturn[0]['expenses'];
		}
		return 0;
	}

  public function close() {
    $this->conn->close();
  }
}

$db = new Database;