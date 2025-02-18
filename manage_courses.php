<?php
session_start();

if ($_SESSION['role'] != 'admin') {
    // Redirect if not an admin
    header("Location: login.php");
    exit();
}

include('db.php');

if (isset($_GET['delete'])) {
    $course_id = $_GET['delete'];
    $sql = "DELETE FROM courses WHERE course_id=$course_id";
    if ($conn->query($sql) === TRUE) {
        echo "Course deleted successfully!";
    } else {
        echo "Error deleting course: " . $conn->error;
    }
}

// Fetch all courses from the database
$sql = "SELECT * FROM courses";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Courses</title>
</head>
<body>
    <h2>Manage Courses</h2>
    <table border="1">
        <tr>
            <th>Course Name</th>
            <th>Course Description</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['course_name']; ?></td>
                <td><?php echo $row['course_description']; ?></td>
                <td>
                    <a href="edit_course.php?edit=<?php echo $row['course_id']; ?>">Edit</a> | 
                    <a href="manage_courses.php?delete=<?php echo $row['course_id']; ?>" onclick="return confirm('Are you sure you want to delete this course?');">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
