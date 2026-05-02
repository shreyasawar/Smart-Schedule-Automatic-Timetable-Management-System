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
    <title>Mark Teacher Absence</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
</head>
<body>
    <nav>
        <div class="nav-logo">
            <img src="logo2.png" alt="College Logo" id="logo">
        </div>
        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="mark_absent.php">Mark Absence</a>
            <a href="view_timetable.php">View Timetable</a>
        </div>
    </nav>
    <div class="container">
        <h1>Mark Teacher Absence</h1>
        <form action="submit_absence.php" method="POST">
            <div class="form-group">
                <label for="teacher_name">Teacher Name:</label>
                <select id="teacher_name" name="teacher_name" required>
                    <option value="" disabled selected>Select Teacher</option>
                    <option value="Mrs. Shweta K">Mrs. Shweta K</option>
                    <option value="Mrs. Purnima R">Mrs. Purnima R</option>
                    <option value="Mrs. Aboli">Mrs. Aboli</option>
                    <option value="Mrs. Prachi S">Mrs. Prachi S</option>
                    <option value="Mrs. Rozina N">Mrs. Rozina N</option>
                    <option value="Mrs. Swati A">Mrs. Swati A</option>
                    <option value="Mrs. Shivani C">Mrs. Shivani C</option>
                    <option value="Mrs. Khushboo V">Mrs. Khushboo V</option>
                    <option value="Mrs. Priyanka M">Mrs. Priyanka M</option>
                    <option value="Mr. Amin N">Mr. Amin N</option>
                    <option value="Mrs. Akansha D">Mrs. Akansha D</option>
                    <option value="Mrs. Suruchi P">Mrs. Suruchi P</option>
                    <option value="Mrs. Anindita">Mrs. Anindita</option>
                    <option value="Mrs. Ashwini A">Mrs. Ashwini A</option>
                    <option value="Mrs. Rida S">Mrs. Rida S</option>
                    <option value="Mrs. Lekha">Mrs. Lekha</option>
                    <option value="Mrs. Anita B">Mrs. Anita B</option>
                    <option value="Mr. Huzaifa">Mr. Huzaifa</option>
                    <option value="Mrs. Sarika">Mrs. Sarika</option>
                    <option value="Mrs. Mansi">Mrs. Mansi</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="date">Date of Absence:</label>
                <input type="date" id="date" name="date" required>
            </div>
            
            <div class="form-group">
                <label for="reason">Reason:</label>
                <textarea id="reason" name="reason" placeholder="Enter reason for absence" required></textarea>
            </div>
            
            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
</body>
</html>