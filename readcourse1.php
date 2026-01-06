<?php
require_once("db_connect.php");
$connect = mysqli_connect(HOST, USER, PASS, DB) or die("Cannot connect");
$query="SELECT * FROM Course";
$result=mysqli_query($connect,$query) or die ("query failed");
?>

    <h2>Course Table</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
        </tr>
        <?php while($row=mysqli_fetch_assoc($result)){?>
            <tr>
            <td><?php echo $row['course_id'];?></td>
            <td><?php echo $row['title'];?></td>
            </tr>
            


        <?php } ?>

        


    </table>
    <p><a href="index1.html">Back to Home</a></p>
