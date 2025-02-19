<?php
session_start();
require 'db.php'; // Include database connection

// Check if the role session is set, if not, redirect to login page
if (!isset($_SESSION['role'])) {
    header("Location: login.php");
    exit();
}
if ($_SESSION['role'] == 'admin') {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/style.css">
        <title>Admin Dashboard</title>
        <style>
            .admin-container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background: linear-gradient(to right,rgb(173, 206, 186),rgb(134, 206, 165)); 
            }
            .admin-box {
                background: #fff;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                text-align: center;
                width: 350px;
            }
            .admin-options {
                margin-top: 20px;
            }
            .admin-btn {
                display: block;
                padding: 10px;
                margin: 10px 0;
                background-color: #28a745;
                color: white;
                text-decoration: none;
                border-radius: 5px;
            }
            .admin-btn:hover {
                background-color: #218838;
            }
            .logout {
                margin-top: 20px;
            }
            .logout-btn {
                padding: 10px;
                background-color: #dc3545;
                color: white;
                text-decoration: none;
                border-radius: 5px;
            }
            .logout-btn:hover {
                background-color: #c82333;
            }
        </style>
    </head>
    <body>
    <div class="admin-container">
        <div class="admin-box">
            <h2>Welcome, Admin!</h2>
            <p>Manage the courses and content for Eco Kids.</p>
            <div class="admin-options">
                <a href='add_course.php' class='admin-btn'>➕ Add New Course</a>
                <a href='manage_courses.php' class='admin-btn'>📚 Manage Courses</a>
            </div>
            <div class="logout">
                <a href='logout.php' class='logout-btn'>Logout</a>
            </div>
        </div>
    </div>
</body>
</html>
<?php
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Eco Kids - Courses</title>

    <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background: linear-gradient(to right, rgb(173, 206, 186), rgb(134, 206, 165));
            }
            main {
                text-align: center;
                padding: 40px 20px;
            }
            h2 {
                color: #333;
                margin-bottom: 20px;
            }
            .course-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 20px;
            }
            .course-box {
                background: white;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                width: 300px;
                text-align: center;
            }
            .course-box h3 {
                color: #219150;
                margin-bottom: 10px;
            }
            .course-box p {
                color: #555;
                font-size: 14px;
                margin-bottom: 15px;
            }
            .follow-btn {
                background-color: #28a745;
                color: white;
                padding: 10px 15px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background 0.3s;
            }
            .follow-btn:hover {
                background-color: #218838;
            }
        </style>
</head>
<body>
    <header>
        <div class="header-content">
            <nav>
                <div class="logo">
                    <a href="index.php">
                        <img src="assets/images/logo.png" alt="Eco Kids Logo">
                    </a>
                </div>
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
                <div class="login-btn">
                    <a href="logout.php">Logout</a>
                </div>
            </nav>
        </div>
    </header>

    <main>
    <h2>Available Courses</h2>
        <div class="course-container">
            <?php
            $query = "SELECT course_name, course_description FROM courses";
            $result = mysqli_query($conn, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                while ($course = mysqli_fetch_assoc($result)) {
                    $course_name = htmlspecialchars($course['course_name']);
                    $course_desc = htmlspecialchars($course['course_description']);
                    echo "<div class='course-box'>";
                    echo "<h3>$course_name</h3>";
                    echo "<p>$course_desc</p>";
                    echo "<button class='follow-btn'>Follow Course</button>";
                    echo "</div>";
                }
            } else {
                echo "<p>No courses available.</p>";
            }
            ?>
    </main>
    <br>
    

    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2024 Eco Kids. All rights reserved.</p>
        </div>
    </footer>

    <script src="assets/js/script.js"></script>    
</body>
</html>
<?php
}
?>
