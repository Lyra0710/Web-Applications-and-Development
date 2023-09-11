<?php
include('connection.php'); // Include the database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Your registration logic here...
    // You don't need to create a table here.

    // Example code to insert data into the users table:
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $INSERT = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
    
    $stmt = $conn->prepare($INSERT);
    
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sss", $username, $password, $email);
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        echo "Registration successful.";
        header('Location: login.html');
        exit; 
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Form not submitted.";
}

$conn->close();
?>
