<?php
session_start();

if ($_SESSION['role'] != 'admin') {
    // Redirect if not an admin
    header("Location: login.php");
    exit();
}

include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_name = $_POST['course_name'];
    $course_description = $_POST['course_description'];

    $sql = "INSERT INTO courses (course_name, course_description) VALUES ('$course_name', '$course_description')";

    if ($conn->query($sql) === TRUE) {
        echo "New course added successfully!";
        header("Location: courses.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
</head>
<body>
    <h2>Add New Course</h2>
    <form action="add_course.php" method="POST">
        <label for="course_name">Course Name:</label>
        <input type="text" name="course_name" required><br><br>
        <label for="course_description">Course Description:</label>
        <textarea name="course_description" required></textarea><br><br>
        <button type="submit">Add Course</button>
    </form>
</body>
</html>
