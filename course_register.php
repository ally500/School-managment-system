<?php
session_start();

$conn=mysqli_connect("localhost","root","","school");
$message="";
$message1="";
$message2="";
if (isset($_SESSION['StudentID'])){

?>

<?php
 if(isset($_POST['sub'])){

    $studentid=$_POST['stdid'];
    $sdntname=$_POST['nm'];
    $coursename=$_POST['crsname'];
    
    $check="SELECT StudentID from student_course where StudentID='$studentid'";
    $res=mysqli_query($conn,$check);

    if(mysqli_num_rows($res)){

        $message="You have already registered for this course!";

    }else{

        $query="INSERT INTO student_course (StudentID,course_id) VALUES('$studentid','".$coursename."')";

        $results=mysqli_query($conn,$query);
    
        if($results){

            $message1="Dear $sdntname class You request is Added successfully!";
        
        }else{
            $message2="Unknown error occured!" or die (mysqli_error($conn));
        }

    }

 }

?>



<!DOCTYPE html>
<html>
    <head>
        <title>Apply for Class</title>
        <style>
            body{
                text-align: center;
            }
            h3{
               color:red;
            }

        </style>
    </head>

    <body>

        <h2><strong>COMPLETE CLASS APPLICATION</strong></h2>

        <form action="" method="POST">
        <div>
        <h3><?php echo $message;?></h3><h3><?php echo $message1;?></h3>
            <?php
            $conn= mysqli_connect("localhost","root","","school");
            $id=$_SESSION['StudentID'];
            $query = "SELECT * FROM accounts WHERE StudentID='$id'";
            $results=mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($results))
            {
            ?>
            <input type="hidden" name="stdid" value="<?php echo$row['StudentID'];?>">
            <input type="text" value="<?php echo $row['FirstName']; ?> <?php echo $row['LastName']; ?> " name="nm" size="28" required><br>
            <?php
            }
            ?>
        </div>

        <div>
            <label>   
                <p><strong>Course Name:</strong></p> 
            </label>
        <select name="crsname">
            <option>Course name</option>
            <?php
            $conn= mysqli_connect("localhost","root","","school");
            $query = "SELECT * FROM course";
            $results=mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($results))
            {
            ?>
            <option value="<?php echo $row["course_id"]; ?>"><?php echo $row["course_name"]; ?></option>
            <?php
            }
            ?>
            
            
        </select>
        </div><br>
            <button type="submit" name="sub">Add</button>

        </form><br><br>
        <button><a href="welcome.php">BACK TO DASHBOARD</a></button>
    </body>
</html>

<?php
         
}else{
     header("Location: login_form.php");
     exit();
}
 ?>

