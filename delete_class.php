<?php
$conn= mysqli_connect("localhost","root","","school");

$id=$_GET['class_id'];
$query = "DELETE FROM class WHERE class_id='$id'"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: display_class.php"); 
?>