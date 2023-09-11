<?php
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "imagerecog";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

if ($conn->connect_error) {
    die('Could not connect to the database: ' . $conn->connect_error);
}

$tableQuery = "
    CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(255) UNIQUE NOT NULL
    )
";

if (mysqli_query($conn, $tableQuery)) {
    echo "Table created successfully.";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
