<?php
// Database connection
include 'config.php';

// Example timetable generation logic
$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
$time_slots = ['09:20', '10:15', '11:10', '11:30', '12:25', '01:25', '02:20', '03:15'];

// Sample query to fetch subjects and teachers for BCA
$query = "SELECT teacher_id, subject_id, year, section FROM Teacher_Subjects WHERE year IN (1, 2, 3) AND section IN ('A', 'B')";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        foreach ($days as $day) {
            foreach ($time_slots as $slot) {
                // Check for teacher availability
                $teacher_id = $row['teacher_id'];
                $subject_id = $row['subject_id'];
                $year = $row['year'];
                $section = $row['section'];
                
                // Avoid duplicate or conflict with already scheduled slots
                $check_query = "SELECT * FROM Timetable WHERE day_of_week='$day' AND time_slot='$slot' AND (teacher_id='$teacher_id' OR (year='$year' AND section='$section'))";
                $check_result = $conn->query($check_query);
                
                if ($check_result->num_rows == 0) {
                    // Insert into timetable
                    $insert_query = "INSERT INTO Timetable (day_of_week, time_slot, subject_id, teacher_id, year, section)
                                    VALUES ('$day', '$slot', '$subject_id', '$teacher_id', '$year', '$section')";
                    $conn->query($insert_query);
                }
            }
        }
    }
}
echo "Timetable generated successfully!";
?>