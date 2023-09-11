<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    echo $username;
    echo $password;

    // Database connection parameters
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "imagerecog";

    // Create a connection to the database
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    // Check for a successful connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare an SQL query to retrieve user data
    $sql = "SELECT * FROM users WHERE username = ?";
    
    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind the username parameter
    $stmt->bind_param("s", $username);

    // Execute the statement
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();

    // Check if a user with the provided username exists
    if ($result->num_rows === 1) {
        // Fetch user data
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row["password"])) {
            // Password is correct, authentication successful
            echo "success";
        } else {
            // Password is incorrect
            echo "error";
        }
    } else {
        // User not found
        echo "error";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
