<?php
session_start();

if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include('db.php');

if (isset($_GET['delete'])) {
    $course_id = intval($_GET['delete']);
    $stmt = $conn->prepare("DELETE FROM courses WHERE course_id = ?");
    $stmt->bind_param("i", $course_id);
    
    if ($stmt->execute()) {
        echo "<p class='success-message'>Course deleted successfully!</p>";
        header("Location: manage_courses.php"); // Redirect to prevent re-execution
        exit();
    } else {
        echo "<p class='error-message'>Error deleting course: " . $conn->error . "</p>";
    }
    $stmt->close();
}

$sql = "SELECT * FROM courses";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Courses</title>
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

        .table-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 600px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #219150;
            color: white;
        }

        .action-links a {
            text-decoration: none;
            margin: 0 5px;
            color: #219150;
        }

        .action-links a:hover {
            color: #1e8449;
        }

        .no-courses {
            font-size: 18px;
            color: #555;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="table-container">
        <h2>Manage Courses</h2>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <tr>
                    <th>Course Name</th>
                    <th>Course Description</th>
                    <th>Actions</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['course_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['course_description']); ?></td>
                        <td class="action-links">
                            <a href="edit_course.php?edit=<?php echo $row['course_id']; ?>">Edit</a> |
                            <a href="manage_courses.php?delete=<?php echo $row['course_id']; ?>" onclick="return confirm('Are you sure you want to delete this course?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p class="no-courses">No courses available.</p>
        <?php endif; ?>
    </div>
</body>
</html>
