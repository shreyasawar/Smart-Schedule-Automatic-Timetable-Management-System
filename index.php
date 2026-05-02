<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automatic Timetable Management</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav>
        <div class="nav-logo">
            <img src="logo2.png" alt="College Logo" id="logo">
        </div>
        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="mark_absent.php">Mark Absence</a>
            <a href="view_timetable.php">View Timetable</a>
            <a href="logout.php">Logout</a>

        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <header>
            <h1>Smart Schedule</h1>
            <p>This is where you will manage your timetable.</p>
        </header>
        <div class="buttons">
            <a href="mark_absent.php" class="button" id="markAbsenceBtn">Mark Absence</a>
            <a href="view_timetable.php" class="button" id="viewTimetableBtn">View Timetable</a>
        </div>
        <footer>
            <p>&copy; 2025 Timetable Management System. All rights reserved.</p>
        </footer>
    </div>
    <script src="script.js"></script>
</body>
</html>