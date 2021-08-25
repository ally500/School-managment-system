<?php 
session_start();

if (isset($_SESSION['StudentID'])){

  

 ?>

<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
        *
        {
        box-sizing: border-box;
        }

/* Style the body */
body {
    font-family: Arial;
    padding: 20px;
    background: #f1f1f1;
  }
  

/* Header/logo Title */
.header {
    padding:  20px;
    font-size: 15px;
    text-align: center;
    background: white;
  

}
.transbox {
  margin: 30px;
  background-color: #ffffff;
  border: 3px solid black;
  margin-left: 270px;
  width: 50%;
  margin-top: 100px;

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
.wrapper{
    width: 100%;
    margin: auto; 
    text-decoration: none; 
}
.wrapper ul{
    list-style: none;
    margin-top: 3px;
    text-decoration: none

}
.wrapper ul li{
    background: rgb(0,100,0);
    width: 170px;
    border: 1px solid white;
    height: 50px;
    line-height: 50px;
    color: black;
    float: left;
    font-style: 19px;
    position: relative;
    text-align: center;
    text-decoration: none
}
.wrapper ul li:hover{
    background: white;
    color: red;

}
.wrapper ul ul{
    display: none;
}
.wrapper ul li:hover >ul{
    display: block;
} 
.wrapper ul ul ul{
    margin-left: 100px;
}
/* 
.navbar {
  overflow: hidden;
  background-color: green;
 
}

.navbar a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;

 
}


.navbar a.right {
  float: right;
}


.navbar a:hover {
  background-color: #ddd;
  color: black;
}
*/

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
    <div class="wrapper">
        <ul>
        <li><a href="search.php">My Results</a></li>
        <li><a href="course_register.php">Class</a>
        <div class="sub-menu-1">
            <ul>
                <li><a href="course_register.php">Apply for class</a></li>
                <li><a href="course_register.php">Apply for course</a></li>
            </ul>

        </div>

       </li>
        <li><a href="#">Accomodation</a></li>
        <li><a href="change_password.php">Account</a></li>
        <li><a href="info_test.php">Fill Information</a></li>
        <li><a href="logout.php" class="right"><i class="fa fa-power-off"></i>Log-Out</a></li>
        </ul>
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