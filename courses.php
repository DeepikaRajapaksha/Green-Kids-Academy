<?php
session_start();
require 'db.php'; // Include database connection

// Check if the role session is set, if not, redirect to login page
if (!isset($_SESSION['role'])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['role'] == 'admin') {
    echo "<h1>Welcome to the Courses Page, " . htmlspecialchars($_SESSION['username']) . "!</h1>";
    echo "<a href='add_course.php'>Add New Course</a><br>";
    echo "<a href='manage_courses.php'>Manage Courses</a><br>";
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Eco Kids - Courses</title>
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
                    <li><a href="About.php">About</a></li>
                    <li><a href="ContactUs.php">Contact Us</a></li>
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
            // Fetch courses from the database
            $query = "SELECT course_name, course_description FROM courses"; // Updated column names
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($course = mysqli_fetch_assoc($result)) {
                    $course_name = isset($course['course_name']) ? htmlspecialchars($course['course_name']) : 'No Name';
                    $course_desc = isset($course['course_description']) ? htmlspecialchars($course['course_description']) : 'No Description Available';

                    echo "<div class='course-box'>";
                    echo "<h3>$course_name</h3>";
                    echo "<p>$course_desc</p>";
                    echo "<button class='follow-btn'>Follow Course</button>"; // Simple follow button without ID
                    echo "</div>";
                }
            } else {
                echo "<p>No courses available.</p>";
            }
            ?>
        </div>
    </main>

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
