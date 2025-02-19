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
        echo "<p class='success-message'>New course added successfully!</p>";
        header("Location: manage_courses.php");
        exit();
    } else {
        echo "<p class='error-message'>Error: " . $conn->error . "</p>";
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
    <style>
        body {
            background: linear-gradient(to right, rgb(173, 206, 186), rgb(134, 206, 165));
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .form-container {
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

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .submit-btn {
            width: 100%;
            background-color: #219150;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #1e8449;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add New Course</h2>
        <form action="add_course.php" method="POST">
            <label for="course_name">Course Name:</label>
            <input type="text" name="course_name" required>
            
            <label for="course_description">Course Description:</label>
            <textarea name="course_description" required></textarea>
            
            <button type="submit" class="submit-btn">Add Course</button>
        </form>
    </div>
</body>
</html>
