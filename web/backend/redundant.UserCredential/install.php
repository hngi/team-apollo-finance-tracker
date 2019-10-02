<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password,);
// Check if connected
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the database
$sql = "CREATE DATABASE tracker";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
$conn->close();
$conn = new mysqli($servername, $username, $password,"tracker");
// Check if connected
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//create the user table
$sql = "CREATE TABLE users (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `firstname` varchar(128) NOT NULL,
        `lastname` varchar(128) NOT NULL,
        `password` varchar(128) NOT NULL,
        `email` varchar(128) NOT NULL,
        `time` varchar(128) NOT NULL,
        PRIMARY KEY (id)
)";
if ($conn->query($sql) === TRUE) {
    echo "Table Users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

//create the user table
$sql = "CREATE TABLE expense (
  `id` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `time` int(12)  NOT NULL,
  `item` varchar(200)  NOT NULL,
  `cost` DECIMAL(19,2)  NOT NULL,
   `details` varchar(225),
        PRIMARY KEY (id)
)";
if ($conn->query($sql) === TRUE) {
    echo "Table expense created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
echo "All is set now";
$conn->close();
?>
