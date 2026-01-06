<?php
require_once("db_connect.php"); // Include database constants
$connect = mysqli_connect(HOST, USER, PASS, DB) or die("Cannot connect");

$message = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cid = $_POST['course_id']; // Get selected course ID

    // Delete query
    $query = "DELETE FROM Course WHERE course_id = '$cid'";

    if (mysqli_query($connect, $query)) {
        $message = "Course '$cid' deleted successfully!";
    } else {
        $message = "Delete failed: " . mysqli_error($connect);
    }
}

// Fetch all courses for dropdown
$courses = mysqli_query($connect, "SELECT course_id, title FROM Course");
?>

<!DOCTYPE html>
<html>
<body>

<h2>Delete a Course</h2>

<?php if ($message != "") echo "<p><strong>$message</strong></p>"; ?>

<form action="" method="POST">
    Select Course:
    <select name="course_id" required>
        <?php while($row = mysqli_fetch_assoc($courses)) { ?>
            <option value="<?php echo $row['course_id']; ?>">
                <?php echo $row['course_id'] . " - " . $row['title']; ?>
            </option>
        <?php } ?>
    </select>
    <br><br>
    <input type="submit" value="Delete Course">
</form>

<p><a href="readcourse1.php">View Course Table</a></p>
<p><a href="index1.html">Go Home</a></p>

</body>
</html>
