<?php 
session_start();
$message="";

$conn=mysqli_connect("localhost","root","","school");

if (isset($_SESSION['StudentID'])){
?>

<?php

$id=$_SESSION['StudentID'];

$query ="SELECT * FROM student_information where StudentID='$id'";

$results=mysqli_query($conn, $query);

if (mysqli_num_rows($results) > 0) {

    $message="You have Already fullfilled Your information";

}else{
    header("location: info_form.php");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Student Profile</title>

    <meta name="author" content="Codeconvey" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
    
	    <link rel="stylesheet" href="css/style_student.css">
</head>
<body>
		
<div class="ScriptTop">
    <div class="rt-container">
        <div class="col-rt-4" id="float-right">
 
            <!-- Ad Here -->
            
        </div>
        <div class="col-rt-2">
            <ul>
                <li><a href="welcome.php" title="Back to dashboard page">Back to Dashboard</a></li>
            </ul>
        </div>
    </div>
</div>

<header class="ScriptHeader">
    <div class="rt-container">
    	<div class="col-rt-12">
        	<div class="rt-heading">
            	<h1>Student Profile Page</h1>
            </div>
        </div>
    </div>
</header>

<section>
    <div class="rt-container">
          <div class="col-rt-12">
              <div class="Scriptcontent">
              
<!-- Student Profile -->
<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <img class="profile_img" src="https://source.unsplash.com/600x300/?student" alt="student dp">
            <?php
            $conn= mysqli_connect("localhost","root","","school");
            $id=$_SESSION['StudentID'];
            $query = "SELECT * FROM accounts WHERE StudentID='$id'";
            $results=mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($results))
            {
            ?>
            <h3><?php echo $row['FirstName']; ?> <?php echo $row['LastName']; ?></h3>
             
          </div>
          <div class="card-body">
            <p class="mb-0"><strong class="pr-1">Student ID:</strong><?php echo $row['StudentID']; ?></p>
            <?php
               }
               $query="SELECT ac.StudentID,ac.FirstName, ac.LastName,c.class_name,cou.course_name

              FROM accounts AS ac
              LEFT JOIN student_class AS sc ON ac.StudentID = sc.StudentID
              LEFT JOIN class AS c ON c.class_id = sc.class_id
              LEFT JOIN student_course AS scr ON ac.StudentID = scr.course_id 
              LEFT JOIN course AS cou ON cou.course_id = scr.course_id";
              
              $result=mysqli_query($conn,$query);
     ?>
              
            
            <p class="mb-0"><strong class="pr-1">Class:</strong>4</p>
            <p class="mb-0"><strong class="pr-1">Section:</strong>A</p>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <tr>
                <th width="30%">Roll</th>
                <td width="2%">:</td>
                <td>125</td>
              </tr>
              <tr>
                <th width="30%">Academic Year	</th>
                <td width="2%">:</td>
                <td>2020</td>
              </tr>
              <tr>
                <th width="30%">Gender</th>
                <td width="2%">:</td>
                <td>Male</td>
              </tr>
              <tr>
                <th width="30%">Religion</th>
                <td width="2%">:</td>
                <td>Group</td>
              </tr>
              <tr>
                <th width="30%">blood</th>
                <td width="2%">:</td>
                <td>B+</td>
              </tr>
            </table>
          </div>
        </div>
          <div style="height: 26px"></div>
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Other Information</h3>
          </div>
          <div class="card-body pt-0">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- partial -->
           
    		</div>
		</div>
    </div>
</section>
     


    <!-- Analytics -->

	</body>
</html>



<?php       
}else{
     header("Location: login_form.php");
     exit();
}
 ?>



