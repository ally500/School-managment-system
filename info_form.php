<?php 
session_start();

$conn=mysqli_connect("localhost","root","","school");
$message="";
$message1="";

if (isset($_SESSION['StudentID'])){

?>

  

<?php


if(isset($_POST['sub'])){

$id = $_POST['studntid'];
$birthdate = $_POST['brthdt'];
$gender = $_POST['gender'];
$phonenbr = $_POST['phonenbr'];
$country = $_POST['country'];
$province = $_POST['province'];
$city = $_POST['city'];

 
$query="INSERT INTO student_information (StudentID,gender,birth_date,phone_number,country_id,province_id,
city_id) VALUES('$id','".$gender."','".$birthdate."','".$phonenbr."','$country','$province','$city')";
 
$result=mysqli_query($conn,$query);

if($result){
   $message="You have successfully fullfilled Your information!";
}else{
  $message="Unknown error occured ?" or die (mysqli_query($result));
}


}
?>



<!DOCTYPE html>
<html>
<head>
<title></title>
<style>

body{
  text-align: center;
}

.container {
  padding: 50px;
  background-color: white;
  
}


input[type=text],input[type=date],input[type=password] {
  width: 40%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=date],input[type=password]:focus {
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
  width: 40%;
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
</head>

<body>

    
<div>
<form action="" method="post">
  <div class="container">
    <h1>Fill Your Information</h1>
    <!--<p>Please fill in this form an account.</p> -->
    <h3><?php echo $message;?></h3><h3><?php echo $message1;?></h3>
    <hr>
    <div>
      <label for="name"><b>Student Name</b></label>
      <?php
      $conn= mysqli_connect("localhost","root","","school");

      $id=$_SESSION['StudentID'];

      $query = "SELECT * FROM accounts where StudentID='$id'";
      $results=mysqli_query($conn, $query);
      while($row = mysqli_fetch_array($results))
      {
      ?>
      <input type="text" value="<?php echo $row['FirstName']; ?> <?php echo $row['LastName']; ?> " name="" required><br>
      <input type="hidden" name="studntid" class="" value="<?php echo $row['StudentID']; ?>">
      <?php
      }
      ?>
    </div>
    <label for="text"><b>Birth Date</b></label>
    <input type="date" placeholder="enter your birthdate" name="brthdt" required>
    <div>  
<label> <b>Gender :<br></b></label><br>  
<input type="radio" value="Male" name="gender"> Male   
<input type="radio" value="Female" name="gender"> Female   
<input type="radio" value="Other" name="gender"> Other  

</div><br>  
    <label for="phone"><b>Phone Number</b></label>
    <input type="text" placeholder="Enter phone number" name="phonenbr" required><br>


    <label for="Province"><b>Country:</b></label>
     <select name="country"><br>
         <option value="">select Your country</option>
         <?php
      $conn= mysqli_connect("localhost","root","","school");
      $query = "SELECT * FROM country";
      $results=mysqli_query($conn, $query);
      while($row = mysqli_fetch_array($results))
      {
      ?>
         <option value="<?php echo $row['country_id']; ?>"><?php echo $row['country_name']; ?></option>

   <?php
       }
    ?>
         
</select><br><br><br>

<label for="Province"><b>Province:</b></label>
     <select name="province"><br>
    <option value="">select Your province</option>
    <?php
      
      $query = "SELECT * FROM province";
      $results=mysqli_query($conn, $query);
      while($row = mysqli_fetch_array($results))
      {
      ?>
    <option value="<?php echo $row['province_id']; ?>"><?php echo $row['province_name']; ?></option>
    <?php
       }
    ?>
         
</select><br><br><br>

<label for="Province"><b>City:</b></label>
     <select name="city"><br>
    <option value="">select yout city</option>
    <?php
     
      $query = "SELECT * FROM city";
      $results=mysqli_query($conn, $query);
      while($row = mysqli_fetch_array($results))
      {
      ?>
    <option value="<?php echo $row['city_id']; ?>"><?php echo $row['city_name']; ?></option>
    <?php
       }
    ?>
    
</select><br><br><br>
    
    <button type="submit" name="sub" class="registerbtn">Submit</button>
  </div>
  
  
  </div>
</form>


</div>
<button><a href="welcome.php">BACK TO DASHBOARD</a></button>
</body> 
</html>

<?php
         
}else{
     header("Location: login_form.php");
     exit();
}
 ?>









