<?php
session_start();

$message="";

$conn= mysqli_connect("localhost","root","","school");

if(isset($_POST['sub'])){

   $frstname=$_POST['firstname'];
   $lstname=$_POST['lastname'];
   $course=$_POST['crsname'];
   $gender=$_POST['gender'];
   $cuntry=$_POST['countrycode'];
   $phone=$_POST['phone'];
   $birthday=$_POST['birthday'];
   $email=$_POST['email'];
   $password=$_POST['psw'];
   $confirm=['psw-repeat'];
    
   

    $query="INSERT INTO students (first_name,last_name,course_Name,gender,country_code,
    phone_number,birth_date,email,password) VALUES('".$frstname."','".$lstname."','".$course."','".$gender."',
    '".$cuntry."','".$phone."','".$birthday."','".$email."','".$password."')";
 
    $results=mysqli_query($conn,$query);

    if($results){

      $message="Account Successfully Created";

    
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
  body {
        background-color: #F3EBF6;
        font-family: 'Ubuntu', sans-serif;
    }
    .main {
        background-color: #FFFFFF;
        width: 600px;
        height: 400px;
        margin: 7em auto;
        margin-top:-17px;
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
    }
    .sign {
        padding-top: 40px;
        color: green;
        font-family: 'Ubuntu', sans-serif;
        font-weight: bold;
        font-size: 23px;
    }
    .un {
    width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
    form.form1 {
        padding-top: 40px;
    }
    .pass {
            width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
    .un:focus, .pass:focus {
        border: 2px solid rgba(0, 0, 0, 0.18) !important;
    }
    .submit {
      cursor: pointer;
        border-radius: 5em;
        color: #fff;
        background: linear-gradient(to right, #9C27B0, #E040FB);
        border: 0;
        padding-left: 40px;
        padding-right: 40px;
        padding-bottom: 10px;
        padding-top: 10px;
        font-family: 'Ubuntu', sans-serif;
        margin-left: 35%;
        font-size: 13px;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
    }
    .forgot {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: green;
        padding-top: 15px;
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #E1BEE7;
        text-decoration: none
    }
    /*
    a {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #E1BEE7;
        text-decoration: none
    }
    */
    

    
</style>
<link rel="stylesheet" href="css/style.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Sign in</title>

</head>
<body>

<div class="header">
  <h2> A UNIVERSITY SCHOOL</h2>
</div>
<div class="menu-bar">
    <ul>
        <li class="active"><a href="home.php"><i class="fa fa-home"></i>Home</a></i></li>
        <li><a href="#"><i class="fa fa-user-circle-o"></i>Students</a>
            <div class="sub-menu-1">
                <ul>
                    <li><a href="login_form.php">Log In</a></li>
                    <li><a href="registration.php">Registration</a></li>
                    <li><a href="#"></a></li>
                </ul>
            </div>
        </li>
        <li><a href="#"><i class="fa fa-trophy"></i>Our Mission</a></li>
        <li><a href="#"><i class="fa fa-clone"></i>Service</a></li>
        <li><a href="#"><i class="fa fa-phone"></i>Contact Us</a></li>
    </ul>
</div>
<div class="main">
    <p class="sign" align="center">Sign in</p>
    <form class="form1">
      <input class="un " type="text" align="center" placeholder="Username">
      <input class="pass" type="password" align="center" placeholder="Password">
      <a class="submit" align="center">Sign in</a>
      <p class="forgot" align="center"><a href="#">Forgot Password?</p>
                        
    </div>


<div class="footer">
  <h2> A university school 2021</h2>
</div>


</body>
</html>