<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="css/logstyle.css">
    </head>
    <body>
        <div class="loginbox">
            <img src="css/avatar1.png" class="avatar" alt="">
                 
                  <h1>Login Here</h1>
                  <form action="stuff_login.php"  method="POST">
                      <p>User Name</p>
                      <input type="text" name="uname" placeholder="Enter username" required>
                      <p>Password</p>
                      <input type="password" name="pass" placeholder="Enter Password" required><br>
                      <input type="submit" name="sub" value="Login"><br>
                 
                      <a href="#">Lost Your Password?</a><br>
                      
                  </form>

        </div>


    </body>
</html>

<?php

$conn= mysqli_connect("localhost","root","","school");

if(isset($_POST['sub'])){

    $user = $_POST['uname'];
    $pass = $_POST['pass'];

    $que = "SELECT * FROM staff_user WHERE user_name= '$user' AND user_password = '$pass' ";

    $results=mysqli_query($conn,$que);

    $rows=mysqli_num_rows($results);

    if($rows==1){
        while($row=mysqli_fetch_array($results)){
            if($row['user_type']=='admin'){
        header("location: admin.html"); 
            }
            else if($row['user_type']==('user')){
                header("location: user.html"); 
            }
        }
    }
    else{
        header("location: stuff_login.php");  
    }

   
    

}


?>