<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit;
        } else {
            echo "<script>alert('Invalid password!');</script>";
        }
    } else {
        echo "<script>alert('No user found!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Automatic Timetable Management</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #430269;
        }

        /* Navigation Bar */
        .navbar {
            background-color: #430269;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .login-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 90vh;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.15);
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 350px;
            color: white;
            backdrop-filter: blur(15px);
        }

        .login-box h2 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .input-group {
            margin-bottom: 20px;
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

        .login-btn {
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

        .login-btn:hover {
            background: #ccc;
        }

        .options {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            margin: 15px 0;
        }

        .options a {
            text-decoration: none;
            color: white;
        }

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
    <div class="navbar">Smart Schedule</div>
    
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            
            <form method="post">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter Username" required>
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter Password" required>
                </div>

                <div class="options">
                    <label><input type="checkbox"> Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>

                <button type="submit" class="login-btn">Login</button>
            </form>

            <p>Don't have an account? <a href="register.php">Register</a></p>
        </div>
    </div>
</body>
</html>
