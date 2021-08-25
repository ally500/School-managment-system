<?php
$conn= mysqli_connect("localhost","root","","school");
$message1="";
$message="";

$id=$_GET['StudentID'];

?>
<?php
        if(isset($_POST['sub'])){

            $conn= mysqli_connect("localhost","root","","school");
            
            $id=$_POST['stdid'];

            $course_id=$_POST['clsname'];
      
            $query="UPDATE student_course SET course_id=$course_id WHERE StudentID='$id'";

            $results=mysqli_query($conn,$query);

            if($results){
               $message="course updated successful";
            }else{
                $message1="course do not updated! An error occured";
            }
            


        }


        
   ?>



<!DOCTYPE html>
<html>
    <head>
        <title>update Course</title>
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

        <h2><strong>UPDATE COURSE </strong></h2>

        <form action="" method="POST">
        <div>
        <h3><?php echo $message;?></h3><h3><?php echo $message1;?></h3>
            <p> <strong>Student Name:</strong></p>
            <?php
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
        <p> <strong>Last Course:</strong></p>
            <?php
            $q= "SELECT ac.StudentID,course.course_name,course.course_id
            FROM accounts AS ac
            INNER JOIN student_course AS sc ON ac.StudentID = sc.StudentID
            INNER JOIN course AS course ON course.course_id = sc.course_id
            where ac.StudentID='$id'";
            $s=mysqli_query($conn, $q);
            while($row = mysqli_fetch_array($s))
            {
            ?>
            <input type="text" value="<?php echo $row['course_name']; ?> "  size="28"><br>
            <?php
            }
            ?>
        
        <div>

        </div>

        
        <div>
            <label>   
                <p><strong>New Class:</strong></p> 
            </label>
        <select name="clsname">
 
            <option>Select New Course</option>
            <?php
            $query="SELECT * FROM course";
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
            <button type="submit" name="sub">UPDATE</button>

        </form><br><br>
        <button><a href="admin.html">BACK TO ADMIN</a></button>
    </body>
</html>

















