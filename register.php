<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Insert query with all fields
    $sql = "INSERT INTO users (username, email, mobile, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $email, $mobile, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful! Redirecting to login page.'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Automatic Timetable Management</title>
    <style>
        /* Reset Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Navigation Bar */
        .navbar {
            background: #430269;
            color: white;
            padding: 15px 20px;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Page Background */
        body {
            background-color: #430269;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            flex-direction: column;
            padding-top: 80px; /* Adjust to avoid content hiding behind navbar */
        }

        /* Registration Container */
        .register-container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        /* Registration Box */
        .register-box {
            background: rgba(255, 255, 255, 0.15);
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 350px;
            color: white;
            backdrop-filter: blur(15px);
        }

        /* Heading */
        .register-box h2 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        /* Input Fields */
        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .input-group label {
            font-size: 14px;
            display: block;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.3);
            color: white;
            outline: none;
            font-size: 16px;
        }

        .input-group input::placeholder {
            color: rgba(255, 255, 255, 0.8);
        }

        /* Register Button */
        .register-btn {
            width: 100%;
            background: #fff;
            color: #430269;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .register-btn:hover {
            background: #ccc;
        }

        /* Login Link */
        p {
            font-size: 14px;
            margin-top: 10px;
        }

        p a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

    </style>
</head>
<body>

<!-- Navigation Bar -->
<div class="navbar">
    Smart Schedule
</div>

<div class="register-container">
    <div class="register-box">
        <h2>Register</h2>
        
        <form method="post">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter Username" required>
            </div>

            <div class="input-group">
                <label for="email">Email ID</label>
                <input type="email" id="email" name="email" placeholder="Enter Email" required>
            </div>

            <div class="input-group">
                <label for="mobile">Mobile Number</label>
                <input type="tel" id="mobile" name="mobile" placeholder="Enter Mobile No." required pattern="[0-9]{10}">
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter Password" required>
            </div>

            <button type="submit" class="register-btn">Register</button>
        </form>

        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</div>

</body>
</html>