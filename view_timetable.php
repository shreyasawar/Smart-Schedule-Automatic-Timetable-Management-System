<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "timetable_db"; // Update with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get current day
$currentDay = date('l'); // Gets full weekday name (e.g., Monday)
$currentDate = date('Y-m-d'); // Gets the current date in YYYY-MM-DD format

// Fetch timetable data for the current day
$sql = "SELECT * FROM timetable WHERE day_of_week = '$currentDay' ORDER BY department, year, section, time_slot";
$result = $conn->query($sql);
$timetable = [];

// Fetch absent teachers for today
$absent_sql = "SELECT teacher_name FROM absent_teachers WHERE absence_date = '$currentDate'";
$absent_result = $conn->query($absent_sql);

// Check for query errors
if (!$absent_result) {
    die("Error fetching absent teachers: " . $conn->error);
}

$absent_teachers = [];
while ($absent_row = $absent_result->fetch_assoc()) {
    $absent_teachers[] = $absent_row['teacher_name'];
}

// Process timetable
while ($row = $result->fetch_assoc()) {
    $teacher = $row['teacher'];

    // If teacher is absent, replace subject with "Tutorial"
    $subject = in_array($teacher, $absent_teachers) ? "Tutorial" : $row['subject'];

    $timetable[$row['department']][$row['year']][$row['section']][$row['time_slot']] = [
        'subject' => $subject,
        'teacher' => in_array($teacher, $absent_teachers) ? "N/A" : $teacher
    ];
}

$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Smart Schedule - <?= $currentDay ?> </title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Navigation Bar */
        .navbar {
        background-color: #430269;
        padding: 15px 0;
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        position: fixed;
        width: 100%;
        top: 0;
        left: 0;
        z-index: 1000;
        }
        
        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 20px;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background 0.3s ease;
        }
        .navbar a:hover {
            background-color:rgb(213, 160, 218);
        }

        /* Heading */
        /* Fix Overlapping Issue */
        h1 {
        text-align: center;
        color: #430269;
        padding: 20px 0;
        margin-top: 100px;  /* Push heading below navbar */
        }

        /* Timetable Table */
        .timetable-container {
            width: 90%;
            max-width: 2000px;
            max-height: auto;
            margin:  auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            overflow: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
            color: black;
        }
        th {
            background-color: #430269;
            color: white;
        }
        .highlight {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        .special {
            background-color: #f0f0f0;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav>
        <div class="nav-logo">
            <img src="logo2.png" alt="College Logo" id="logo">
        </div>
        <div class="nav-links">
            <a href="index.php">Go Back</a>
        </div>
    </nav>

    <h1>Smart Schedule - <?= $currentDay ?> </h1>

    <div class="timetable-container">
        <table>
            <tr>
                <th>Department</th>
                <th>Year</th>
                <th>Section</th>
                <th>9:20-10:15</th>
                <th>10:20-11:15</th>
                <th>11:15-11:30</th>
                <th>11:30-12:25</th>
                <th>12:30-1:25</th>
                <th>1:25-2:00</th>
                <th>2:00-2:55</th>
                <th>3:00-3:55</th>
            </tr>

            <?php foreach ($timetable as $dept => $years) { ?>
                <?php foreach ($years as $year => $sections) { ?>
                    <?php foreach ($sections as $section => $slots) { ?>
                        <tr>
                            <td class="highlight"><?= $dept ?></td>
                            <td class="highlight"><?= $year ?></td>
                            <td class="highlight"><?= $section ?></td>
                            <td>
                                <?= isset($slots['9:20-10:15']) ? $slots['9:20-10:15']['subject'] . "<br><small>" . $slots['9:20-10:15']['teacher'] . "</small>" : '' ?>
                            </td>
                            <td>
                                <?= isset($slots['10:20-11:15']) ? $slots['10:20-11:15']['subject'] . "<br><small>" . $slots['10:20-11:15']['teacher'] . "</small>" : '' ?>
                            </td>
                            <td class="special"><b>BREAK</b></td>
                            <td>
                                <?= isset($slots['11:30-12:25']) ? $slots['11:30-12:25']['subject'] . "<br><small>" . $slots['11:30-12:25']['teacher'] . "</small>" : '' ?>
                            </td>
                            <td>
                                <?= isset($slots['12:30-1:25']) ? $slots['12:30-1:25']['subject'] . "<br><small>" . $slots['12:30-1:25']['teacher'] . "</small>" : '' ?>
                            </td>
                            <td class="special"><b>BREAK</b></td>
                            <td>
                                <?= isset($slots['2:00-2:55']) ? $slots['2:00-2:55']['subject'] . "<br><small>" . $slots['2:00-2:55']['teacher'] . "</small>" : '' ?>
                            </td>
                            <td>
                                <?= isset($slots['3:00-3:55']) ? $slots['3:00-3:55']['subject'] . "<br><small>" . $slots['3:00-3:55']['teacher'] . "</small>" : '' ?>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </table>
    </div>

</body>
</html>