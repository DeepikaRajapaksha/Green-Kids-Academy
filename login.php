<?php
session_start();

// Database connection
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hardcoded admin credentials (with email format)
    $admin_email = 'admin@greenkids.com';
    $admin_password = 'admin';

    // Admin login validation
    if ($email == $admin_email && $password == $admin_password) {
        $_SESSION['role'] = 'admin'; // Set admin role in session
        header("Location: courses.php"); // Redirect to courses page
        exit();
    } 

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['role'] = 'user';  // Regular user
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            header("Location: courses.php");
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found with that email!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background: linear-gradient(to right,rgb(173, 206, 186),rgb(134, 206, 165)); 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .login-container {
            background: white;
            padding: 35px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        label {
            display: block;
            text-align: left;
            margin: 10px 0 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            background-color: #219150;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #1e8449;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php
        if (isset($error)) {
            echo "<p style='color:red;'>$error</p>";
        }
        ?>
        <form action="login.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" name="email" required><br><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br><br>

            <button type="submit">Login</button>
        </form>
        <p class="signup-link">Don't have an account? <a href="signup.php">Sign up</a></p>

    </div>
</body>
</html>
