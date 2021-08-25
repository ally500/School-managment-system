<?php
   $message="";
 $conn= mysqli_connect("localhost","root","","school");

 if(isset($_POST['Send'])){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $msg=$_POST['mssg'];

    $query="INSERT INTO message (sender_name,sender_email,sender_message) VALUES('".$name."','".$email."','".$msg."')";

    $results=mysqli_query($conn,$query);

    if($results){
      $message="Message sent successfully!";
      
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
  
  /**{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}

body{
  height: 100vh;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #fae9fb;
  position: relative;
  margin: auto;
}

body::before{
  content: '';
  position: absolute;
  height: 30%;
  width: 50%;
  left: 650px;
  top: 400px;
  background: rgb(0, 70,0);
  clip-path: polygon(86% 0, 100% 0, 100% 100%, 60% 100%);
}
*/

.container{
  z-index: 12;
  max-width: 1050px;
  width: 100%;
  background: #fff;
  border-radius: 12px;
  margin: 0 80px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
}
.container .content{
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 25px 20px;
}
.content .image-box{
  max-width: 55%;
}
.content .image-box img{
  width: 100%;
}
.content .topic{
  font-size: 22px;
  font-weight: 500;
  color: rgb(0, 100,0);
}
.content form{
  width: 40%;
  margin-right: 30px;
}
.content .input-box{
  height: 50px;
  width: 100%;
  margin: 16px 0;
  position: relative;
}
.content .input-box input{
  position: absolute;
  height: 100%;
  width: 100%;
  border-radius: 6px;
  font-size: 16px;
  outline: none;
  padding-left: 16px;
  background: #fae9fb;
  border: 2px solid transparent;
  transition: all 0.3s ease;
}
.content .input-box input:focus,
.content .input-box input:valid{
  border-color: rgb(0, 70,0);
  background-color: #fff;
}
.content .input-box label{
  position: absolute;
  left: 18px;
  top: 50%;
  color: #636c72;
  font-size: 15px;
  pointer-events: none;
  transform: translateY(-50%);
  transition: all 0.3s ease;
}
.content .input-box input:focus ~ label,
.content .input-box input:valid ~ label{
  top: 0;
  left: 12px;
  display: 14px;
  color: rgb(0, 70,0);
  background: #fff;
}
.content .message-box{
  min-height: 100px;
  position: relative;
}
.content .message-box textarea{
  position: absolute;
  height: 100%;
  width: 100%;
  resize: none;
  background: #fae9fb;
  border: 2px solid transparent;
  border-radius: 6px;
  outline: none;
  transition all 0.3s ease;
}
.content .message-box textarea:focus{
  border-color: rgb(0, 70,0);;
  background-color: #fff;
}
.content .message-box label{
  position: absolute;
  font-size: 16px;
  color: #636c72;
  left: 18px;
  top: 6px;
  pointer-events: none;
  transition: all 0.3s ease;
}
.content .message-box textarea:focus ~ label{
  left: 12px;
  top: -10px;
  color: rgb(0, 70,0);;
  font-size: 14px;
  background: #fff;
}
.content .input-box input[type="submit"]{
  color: #fff;
  background: rgb(0, 70,0);;
  padding-left: 0;
  font-size: 18px;
  font-weight: 500;
  cursor: pointer;
  letter-spacing: 1px;
  transition: all 0.3s ease;
}
.content .input-box input[type="submit"]:hover{
  background-color:rgb(0, 70,0);;
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
        <li><a href="#"><i class="fa fa-phone"></i>Contact Us</a></li>
    </ul>
</div>
<div class="container">
    <div class="content">
      <div class="image-box">
      <img src="css/ccxx.png" alt="">
        
      </div>
     <h2><?php echo $message;?></h2>
    <form action="" method="post">
      <div class="topic">Send us a message</div>
      <div class="input-box">
        <input type="text" name="name" required>
        <label>Enter your name</label>
      </div>
      <div class="input-box">
        <input type="text" name="email" required>
        <label>Enter your email</label>
      </div>
      <div class="message-box">
       <textarea name="mssg" id="" cols="30" rows="10"></textarea>
       <label>Enter your message</label>


    </div>

      <div class="input-box">
        <input type="submit" name="Send" value="Send Message">
      </div>
    </form>
  </div>
  </div>

<div class="footer">
<h2> A university school &copy; <?php echo date ('Y'); ?></h2>
</div>

</body>
</html>