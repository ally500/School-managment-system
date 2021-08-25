<?php
$conn= mysqli_connect("localhost","root","","school");

$id=$_GET['StudentID'];
$query = "DELETE FROM student_course WHERE StudentID='$id'"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error($conn));
header("Location: display_student_course.php"); 
?>