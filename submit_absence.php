<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "timetable_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$success = false;
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $teacher_name = trim($_POST['teacher_name']);
    $absence_date = trim($_POST['date']);

    if (empty($teacher_name) || empty($absence_date)) {
        $message = "Error: All fields are required!";
    } else {
        // Validate input to prevent SQL Injection
        $stmt = $conn->prepare("SELECT teacher_id FROM teachers WHERE teacher_name = ?");
        $stmt->bind_param("s", $teacher_name);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $teacher_id = $row['teacher_id'];
        } else {
            $message = "Error: Teacher not found!";
            echo "<script>alert('$message'); window.location.href='mark_absent.php';</script>";
            exit();
        }
        $stmt->close();

        // Insert absent teacher into the database
        $stmt = $conn->prepare("INSERT INTO absent_teachers (teacher_id, teacher_name, absence_date) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $teacher_id, $teacher_name, $absence_date);

        if ($stmt->execute()) {
            $success = true;
            $message = "Absence recorded successfully!";
        } else {
            $message = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absence Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
        }

        .notification {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            background-color: #fff;
        }

        .success {
            color: #430269;
        }

        .error {
            color: #E74C3C;
        }

        .button-container {
            margin-top: 20px;
        }

        .back-button {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #430269;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .back-button:hover {
            background-color: #300150;
        }
    </style>
    <script>
        // Redirect after 3 seconds only if success
        <?php if ($success) { ?>
            setTimeout(() => {
                window.location.href = "view_timetable.php"; // Adjust the URL if necessary
            }, 3000);
        <?php } ?>
    </script>
</head>
<body>
    <div class="notification">
        <h1 class="<?php echo $success ? 'success' : 'error'; ?>">
            <?php echo htmlspecialchars($message); ?>
        </h1>
        <div class="button-container">
            <a href="index.php" class="back-button">Go Back</a>
        </div>
    </div>
</body>
</html>