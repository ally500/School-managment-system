<?php
$conn= mysqli_connect("localhost","root","","school");

$id=$_GET['requestID'];

$query= "DELETE FROM `requests` WHERE `requestID` = '$id'";
$result = mysqli_query($conn,$query) or die ( mysqli_error());
if($result){
    echo "Account has been rejected.";
}else{
    echo "Unknown error occured. Please try again.";
}

?>

<br/><br/>
<a href="pending.php">Back</a>