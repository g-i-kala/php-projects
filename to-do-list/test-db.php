<?php
$servername = "localhost";
$username = "root";
$password = "kupadupa27Mysql!"; // Replace with your MySQL root password
$dbname = "test_db"; // Replace with the database name if you have one

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!!";
?>
