<?php
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "imagerecog";

// Create a connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

if ($conn->connect_error) {
    die('Could not connect to the database: ' . $conn->connect_error);
}
?>