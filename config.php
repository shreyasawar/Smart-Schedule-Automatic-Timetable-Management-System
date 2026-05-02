<?php
$servername = "localhost"; // Your local server
$username = "root";        // Default XAMPP username
$password = "";            // Default XAMPP password (leave blank)
$dbname = "timetable_db";  // Database name (create this in phpMyAdmin)

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if connection works
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>