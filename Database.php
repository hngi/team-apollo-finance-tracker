<?php
/**
 * @Description:this handle the database connection
  and server as mini query builder 
 */
class Database{
	public $conn;
	function __construct()
	{
    
  $this->conn = new mysqli("localhost", "root", "","tracker");
// Check if connected
if ($this->conn->connect_error) {
    die("Connection failed: " . $this->conn->connect_error);
}

	}
	public function query($sql)
	{
		if ($this->conn->query($sql) === TRUE) {
         return TRUE;
		}
		return FALSE;
	}
	public function select($sql)
	{
	 $result = $this->conn->query($sql);

		if ($result->num_rows > 0) {
		return $result->fetch_assoc();
	}
	return 0;
}

	public function close()
	{
		$this->conn->close();
	}
}