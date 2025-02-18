<?php
session_start();

if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include('db.php');

if (isset($_GET['edit'])) {
    $course_id = $_GET['edit'];
    $sql = "SELECT * FROM courses WHERE course_id=$course_id";
    $result = $conn->query($sql);
    $course = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_name = $_POST['course_name'];
    $course_description = $_POST['course_description'];

    $sql = "UPDATE courses SET course_name='$course_name', course_description='$course_description' WHERE course_id=$course_id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Course updated successfully!";
        header("Location: manage_courses.php");
        exit();
    } else {
        echo "Error updating course: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
</head>
<body>
    <h2>Edit Course</h2>
    <form action="edit_course.php?edit=<?php echo $course['course_id']; ?>" method="POST">
        <label for="course_name">Course Name:</label>
        <input type="text" name="course_name" value="<?php echo $course['course_name']; ?>" required><br><br>
        <label for="course_description">Course Description:</label>
        <textarea name="course_description" required><?php echo $course['course_description']; ?></textarea><br><br>
        <button type="submit">Update Course</button>
    </form>
</body>
</html>
