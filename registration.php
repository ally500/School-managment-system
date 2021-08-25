<?php
session_start();

$message1="";
$message2="";
$message3="";
$message4="";

$conn= mysqli_connect("localhost","root","","school");

        if(isset($_POST['sub'])){
            $firstname = $_POST['frstname'];
            $lastname = $_POST['lstname'];
            $email = $_POST['stdemail'];
            $password = $_POST['psw'];
            $pwrpt = $_POST['psw-repeat'];
            $message = "$lastname $firstname would like to request an account.";

             if($password == $pwrpt){

              $check="SELECT email from accounts where email = '$email'";
            
            $res=mysqli_query($conn,$check);

            if(mysqli_num_rows($res) == 1){

              $message4="Email have already taken!";

            }
            else{
              $query = "INSERT INTO `requests` (`requestID`, `firstname`, `lastname`, `email`, `password`, 
            `message`, `date`) VALUES (NULL, '$firstname', '$lastname', '$email', '$password', '$message', CURRENT_TIMESTAMP)";

            $result=mysqli_query($conn,$query);
            if($result){
                $message1="Your account request is now pending for approval. Please wait for confirmation. Thank you.";
            }else{
              $message2="Unknown error occured";
            }

            }

            
        }else{
          $message3="Your confirmation password doesn't much with the first one";
        }
      }
    
    ?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

.menu-bar{
    background: rgb(0, 100,0);
    text-align: center;
  }
  .menu-bar ul {
       display: inline-flex;
       list-style: none;
       color: white;
  }
  .menu-bar ul li{
      width: 120px;
      margin: 15px;
      margin: 15px;
  }
  .menu-bar ul li a {
      text-decoration: none;  
      color: white;
  }
  .menu-bar ul li:hover {
      background: #2bab0d;
      border-radius: 3px;
  }
  .menu-bar .fa {
      margin-right: 8px;
  }
  
  .sub-menu-1{
      display: none;
  }
  
  .menu-bar ul li:hover .sub-menu-1{
      display: inline-table;
      position: absolute;
      background: rgb(0, 100,0);
      margin-top: 15px; 
      margin-left: -15px;
  }

  .menu-bar ul li:hover .sub-menu-1 ul{
      display: block;
      margin: 10px;
      border-bottom: 1px dotted #fff;
      background: transparent;
      border-radius: 0;
      text-align: left;

  }
  /* form start*/
  body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}


.container {
  padding: 16px;
  background-color: white;
  
}


input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}


hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
h3{
  color:red;
}


.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}


a {
  color: dodgerblue;
}

.signin {
  background-color: #f1f1f1;
  text-align: center;
}
 

  

</style>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<div class="header">
  <h2> A UNIVERSITY SCHOOL</h2>
</div>
<div class="menu-bar">
    <ul>
        <li class="active"><a href="home.html"><i class="fa fa-home"></i>Home</a></i></li>
        <li><a href="#"><i class="fa fa-user-circle-o"></i>Students</a>
            <div class="sub-menu-1">
                <ul>
                    <li><a href="login.php">Log In</a></li>
                    <li><a href="registration.php">Registration</a></li>
                    <li><a href="#"></a></li>
                </ul>
            </div>
        </li>
        <li><a href="#"><i class="fa fa-trophy"></i>Our Mission</a></li>
        <li><a href="#"><i class="fa fa-clone"></i>Service</a></li>
        <li><a href="contact.php"><i class="fa fa-phone"></i>Contact Us</a></li>
    </ul>
</div>
<div>
<form action="" method="post">
  <div class="container">
    <h1>Register</h1><h3><?php echo$message1; ?></h3><?php echo$message2; ?> <h3><?php echo$message3; ?></h3> <h3><?php echo$message4; ?></h3>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="text"><b>First Name</b></label>
    <input type="text" placeholder="Enter First name" name="frstname" required>
    <label for="text"><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last name" name="lstname" required>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter email" name="stdemail" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw"  required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat"  required>
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" name="sub" class="registerbtn">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
</form>


</div>
<div class="footer">
  <h2> A university school 2021</h2>
</div>

</body>
</html>


