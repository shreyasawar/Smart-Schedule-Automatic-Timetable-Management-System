<?php
include 'config.php';

$sql = "SELECT * FROM Timetable";  // Simple query to fetch all timetable data
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Day</th><th>Start Time</th><th>End Time</th><th>Teacher ID</th><th>Status</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['day_of_week']}</td>
                <td>{$row['start_time']}</td>
                <td>{$row['end_time']}</td>
                <td>{$row['teacher_id']}</td>
                <td>{$row['status']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No timetable available.";
}

$conn->close();
?>