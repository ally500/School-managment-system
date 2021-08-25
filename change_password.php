
<?php 
session_start();
$conn= mysqli_connect("localhost","root","","school");

if (isset($_SESSION['StudentID'])) {
  $message="";
  $message1="";
  $message2="";
 ?>

 <?php
 if(isset($_POST['Submit'])){
     
     $oldp=$_POST['old_p'];
     $newp=$_POST['new_p'];
     $passrpt=$_POST['new_conf_p'];

     if($newp == $passrpt){

      $id=$_SESSION['StudentID'];
 
     $query= "SELECT user_password FROM accounts WHERE StudentID='$id' AND user_password='$oldp'";
     
     $result= mysqli_query($conn, $query);
 
     if(mysqli_num_rows($result) == 1){
           
         $query_2 = "UPDATE accounts SET user_password='$newp' WHERE StudentID='$id'";
 
         $resul=mysqli_query($conn, $query_2);
 
         if($resul){
             $message="Password updated successfully";
         }
       
     }else{ 
     
         $message1="unknown error occured";
         
     }

     }else{
      $message2="Your confirmation password doesn't much with the first one!";
     }
     
     
 }
 
 
 ?>
 

<!DOCTYPE html>
<html>
<head><title></title>
<style>
  body{
    text-align: center;
  }
</style>
</head>
<body>
<h2>change password</h2><br><br>
<h3><?php echo $message ;?></h3> <h3><?php echo $message1 ;?> </h3><h3><?php echo $message2 ;?> </h3>
<form action="" method="post">
  <label for="oldp">old Password:</label><br>
  <input type="password"  name="old_p" placeholder="enter old password"><br><br>
  <label for="newp">New Password:</label><br>
  <input type="password"  name="new_p" placeholder="enter new password"><br><br>
  <label for="newp">Confirm New Password:</label><br>
  <input type="password"  name="new_conf_p" placeholder="enter new password again"><br><br>

  <input type="submit" name="Submit">
</form> 
<br/><br/>
<a href="welcome.php">Back</a>

</body>
</html>

<?php 
}else{
     header("Location: login_form.php");
     exit();
}
 ?>