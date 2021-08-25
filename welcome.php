<?php 
session_start();

if (isset($_SESSION['StudentID'])){

  

 ?>

<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            * {
  box-sizing: border-box;
}

/* Style the body */
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

/* Header/logo Title */
.header {
  padding: 60px;
  text-align: center;
  
  background-image: url(css/log.jpg);
  border: 2px solid black;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  color: white;

  

}
.transbox {
  margin: 30px;
  background-color: #ffffff;
  border: 3px solid black;
  margin-left: 270px;
  width: 50%;

  opacity: 0.8;
}
.transbox p{
  margin: 5%;
  font-weight: bold;
  color: #f10e0efd;

}
.transbox h1{
  margin: 5%;
  font-weight: bold;
  color: #000000;

}

/* Increase the font size of the heading */
.header h1 {
  font-size: 40px;
}

/* Style the top navigation bar */
.navbar {
  overflow: hidden;
  background-color: green;
 
}

/* Style the navigation bar links */
.navbar a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;

 
}

/* Right-aligned link */
.navbar a.right {
  float: right;
}

/* Change color on hover */
.navbar a:hover {
  background-color: #ddd;
  color: black;
}


        </style>
          
    </head>

<body>
<?php
$conn= mysqli_connect("localhost","root","","school");

$id=$_SESSION['StudentID'];

$query="SELECT * from accounts where StudentID='$id' ";
$results=mysqli_query($conn,$query);

?>

    <div class="header">
    <div class="navbar">
        <a href="result.php">My Results</a>
        <a href="course_register.php">Apply For Course</a>
        <a href="class_register.php">Apply For Class</a>
        <a href="#">Apply For Accomodation</a>
        <a href="change_password.php">Change Password</a>
        <a href="info_test.php">Fill Information</a>
        <a href="logout.php" class="right"><i class="fa fa-power-off"></i>Log-Out</a>
      </div>
      <?php
         if (mysqli_num_rows($results) > 0) {
       ?>
      
        
      <div class="transbox">
        
      <?php
        while($row = mysqli_fetch_array($results)) {
			
        ?>

        <h1>A UNIVERSITY SCHOOL</h1>

        <p><strong>Minds move mountains!! </strong></p>
        <p><strong>Welcome <?php echo $row['FirstName']; ?> <strong><?php echo $row['LastName']; ?></strong></strong></p>
      </div>
        
     </div>
      
      

      <h2> STUDENTS DASHBOARD: </h2><br>
   

</body>
</html>

<?php 
        }
}
}else{
     header("Location: login_form.php");
     exit();
}
 ?>