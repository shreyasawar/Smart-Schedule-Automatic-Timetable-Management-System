<?php
include 'config.php';

// Define username and password
$username = 'admin';
$password = 'admin123'; 

// Hash the password using bcrypt
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// Insert user into database
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";

if ($conn->query($sql) === TRUE) {
    echo "Admin user inserted successfully.";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>