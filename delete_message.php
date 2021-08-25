<?php
$conn= mysqli_connect("localhost","root","","school");

$id=$_GET['message_id'];
$query = "DELETE FROM message WHERE message_id='$id'"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error($conn));
header("Location: display_message.php"); 
?>