<?php
$conn= mysqli_connect("localhost","root","","school");

$id=$_GET['StudentID'];
$query = "DELETE FROM student_class WHERE StudentID='$id'"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error($conn));
header("Location: display_student_class.php"); 
?>