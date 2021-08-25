<?php

$conn= mysqli_connect("localhost","root","","school");
$id = $_GET['StudentID'];

$query="UPDATE student_marks SET marks_status='0' WHERE StudentID='$id'";
 $results=mysqli_query($conn,$query);

 if($results){
     header("location:publish_result_interface.php");
 }
 else
 {
     echo"An error occured!";
 }

?>