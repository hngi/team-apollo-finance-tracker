<?php
$url = "mysql://jpq841kbg8gze4bg:licm3p4nty76w6oo@mna97msstjnkkp7h.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/spzgy3k82bs0ecb6";
$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'],'/'); // USING PRE-INSTALLED DATABASE ON SERVER.

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
echo "Connection was successfully established!";

//Create the user table
/** I intensionally used varchar as datatype of time, 
 * so we save the return value of time() function by doing this we will be able to manipulate as needed.
*/
$sql = "CREATE TABLE users (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`fullname` varchar(128) NOT NULL,
	`password` varchar(128) NOT NULL,
	`email` varchar(128) NOT NULL,
	`spending_limit` DECIMAL(19,2),
	`time` varchar(128) NOT NULL,
	PRIMARY KEY (id)
)";
if ($conn->query($sql) === true) {
  echo "Table Users created successfully";
} 
else {
  echo "Error creating table: " . $conn->error;
}

//Create the expense table
$sql = "CREATE TABLE expense (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`userId` int(11) NOT NULL,
	`time` varchar(128) NOT NULL,
	`item` varchar(200)  NOT NULL,
	`cost` DECIMAL(19,2)  NOT NULL,
	`details` varchar(225),
	PRIMARY KEY (id)
)";
if ($conn->query($sql) === true) {
    echo "Table expense created successfully";
} 
else {
    echo "Error creating table: " . $conn->error;
}

echo "All is set now";
$conn->close();