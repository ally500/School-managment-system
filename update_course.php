<?php
$conn= mysqli_connect("localhost","root","","school");

$id=$_GET['course_id'];

?>



<!DOCTYPE html>
<html>
    <head>
        <title>Update course</title>
        <style>
            body{
                text-align: center;
            }
        </style>
    </head>

    <body>

        <h2><strong>UPDATE COURSE</strong></h2>
        
        <form action="" method="POST">
        
            <p> <strong>Course Name:</strong></p>
            <?php
            $query="SELECT * FROM course WHERE course_id='$id'";
            $result=mysqli_query($conn,$query);
    
            $row=mysqli_fetch_array($result);
            ?>
            <input type="hidden" name="crse_id" class="txtField" value="<?php echo $row['course_id']; ?>">
            <input type="text" name="crsname" value="<?php echo $row['course_name']; ?>" required>
            <p><strong>Course Code:</strong></p>
            <input type="text" name="crscode" value="<?php echo $row['course_code']; ?>" required><br><br>
            
            <button type="submit" name="sub">UPDATE</button>
        </form>        
        
    </body>
</html>

<?php
        if(isset($_POST['sub'])){

            $conn= mysqli_connect("localhost","root","","school");
            
            $id=$_POST['crse_id'];

            $coursename=$_POST['crsname'];
            $corsecode=$_POST['crscode'];


            $query="UPDATE course SET course_name='".$coursename."',course_code='".$corsecode."' WHERE course_id='$id'";

            $results=mysqli_query($conn,$query);

            if($results){
                header("location:display_course.php");
            }
            


        }


        
   ?>
















