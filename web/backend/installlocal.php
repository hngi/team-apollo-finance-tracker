<?php

$hostname ="localhost";
$username = "root";
$password = "";
$database="tracker";

// Create connection
$conn = new mysqli($hostname, $username, $password);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
echo "Connection was successfully established!";
$sql = "CREATE DATABASE tracker";
if ($conn->query($sql) === true) {
  echo "Database created successfully";
} 
else {
  echo "Error creating Database: " . $conn->error;
}
$conn->close();
//created database
// Create new connection
$conn = new mysqli($hostname, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
echo "Connection was successfully established!";
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