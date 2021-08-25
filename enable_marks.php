<?php

$conn= mysqli_connect("localhost","root","","school");
$id = $_GET['StudentID'];
$subid = $_GET['subject_id'];

$query="UPDATE student_marks SET marks_status='1' WHERE StudentID='$id'";
 $results=mysqli_query($conn,$query);

 if($results){
     header("location:publish_result_interface.php");
 }
 else
 {
     echo"An error occured!";
 }

?>