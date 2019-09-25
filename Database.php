<?php
/**
 * @Description:this handle the database connection
and server as mini query builder
 */
class Database
{
    public $conn;
    public function __construct()
    {

        $this->conn = new mysqli("localhost", "root", "mysql", "tracker");
// Check if connected
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

    }
    public function query($sql)
    {
        if ($this->conn->query($sql) === true) {
            return true;
        }
        return false;
    }
    public function select($sql)
    {
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
    public function selectDashboardExpenses($sql)
    {
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

    public function close()
    {
        $this->conn->close();
    }
}
