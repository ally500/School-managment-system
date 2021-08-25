<?php
$conn= mysqli_connect("localhost","root","","school");

$id=$_GET['course_id'];
$query = "DELETE FROM course WHERE course_id='$id'"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error($conn));
header("Location: display_course.php"); 
?>