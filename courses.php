<?php
session_start();

if (!isset($_SESSION['username'])) {
    // If user is not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

echo "<h1>Welcome to the Courses Page, " . $_SESSION['username'] . "!</h1>";
echo "<p>Here you can explore various courses available for you.</p>";
?>
<a href="logout.php">Logout</a>
