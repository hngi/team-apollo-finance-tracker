<?php
$servername = "localhost";
$username   = "root";
$password   = "mysql";

$conn = new mysqli($servername, $username, $password);
// Check if connected
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the database
$sql = "CREATE DATABASE tracker";
if ($conn->query($sql) === true) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
$conn->close();
$conn = new mysqli($servername, $username, $password, "tracker");
// Check if connected
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//create the user table
$sql = "CREATE TABLE users (
`id` int(11) NOT NULL AUTO_INCREMENT,
`fullname` varchar(128) NOT NULL,
`password` varchar(128) NOT NULL,
`email` varchar(128) NOT NULL,
`time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (id)
)";
if ($conn->query($sql) === true) {
    echo "Table Users created successfully.<br/>";
} else {
    echo "Error creating table: " . $conn->error."<br/>";
}

//create the expense table
$sql = "CREATE TABLE expense (
`id` int(11) NOT NULL AUTO_INCREMENT,
`userId` int(11) NOT NULL,
`time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`item` varchar(200)  NOT NULL,
`cost` DECIMAL(19,2)  NOT NULL,
`details` varchar(225),
PRIMARY KEY (id)
)";
if ($conn->query($sql) === true) {
    echo "Table expense created successfully.<br/>";
} else {
    echo "Error creating table: " . $conn->error."<br/>";
}

$sql = "ALTER TABLE `expense` ADD FOREIGN KEY (`userId`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;";
if ($conn->query($sql) === true) {
    echo "Tables altered successfully.<br/>";
} else {
    echo "Error Altering table: " . $conn->error."<br/>";
}

echo "All is set now!";
$conn->close();
