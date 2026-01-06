<?php
require_once("db_connect.php");
$connect = mysqli_connect(HOST, USER, PASS, DB) or die("Cannot connect");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cid = $_POST['course_id'];
    $title = $_POST['title'];

    // Insert both fields
    $query = "INSERT INTO Course (course_id, title) VALUES ('$cid', '$title')";

    if (mysqli_query($connect, $query)) {
        $message = "Course '$cid - $title' added successfully!";
    } else {
        $message = "Insert failed: " ;
    }
}
?>
<html>
    <body>
        <h2>Add Course</h2>
        <?php if ($message != "") echo "<p><strong>$message</strong></p>"; ?>
        <form action="" method="POST">
            Course ID <input type="text" name="course_id" required>
            Course Title <input type="text" name="title" required><br><br>
            <input type="submit" value="Add Course">
        </form>
        <p><a href="readcourse1.php">View Course tabel</a></p>
        <p><a href="index1.html">Go to Home</a></p>
    </body>
</html>




