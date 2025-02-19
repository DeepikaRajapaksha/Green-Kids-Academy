<?php
session_start();

if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include('db.php');

if (isset($_GET['edit'])) {
    $course_id = intval($_GET['edit']);
    $stmt = $conn->prepare("SELECT * FROM courses WHERE course_id = ?");
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $course = $result->fetch_assoc();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_name = $_POST['course_name'];
    $course_description = $_POST['course_description'];

    $stmt = $conn->prepare("UPDATE courses SET course_name = ?, course_description = ? WHERE course_id = ?");
    $stmt->bind_param("ssi", $course_name, $course_description, $course_id);

    if ($stmt->execute()) {
        echo "<p class='success-message'>Course updated successfully!</p>";
        header("Location: manage_courses.php");
        exit();
    } else {
        echo "<p class='error-message'>Error updating course: " . $conn->error . "</p>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
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
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            height: 80px;
            resize: none;
        }

        .btn-container {
            text-align: center;
        }

        button {
            background-color: #219150;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #1e8449;
        }

        .success-message {
            color: green;
            margin-bottom: 10px;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Course</h2>
        <form action="edit_course.php?edit=<?php echo $course['course_id']; ?>" method="POST">
            <label for="course_name">Course Name:</label>
            <input type="text" name="course_name" value="<?php echo htmlspecialchars($course['course_name']); ?>" required>
            
            <label for="course_description">Course Description:</label>
            <textarea name="course_description" required><?php echo htmlspecialchars($course['course_description']); ?></textarea>
            
            <div class="btn-container">
                <button type="submit">Update Course</button>
            </div>
        </form>
    </div>
</body>
</html>
