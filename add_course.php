<!DOCTYPE html>
<html>
    <head>
        <title>add course</title>
        <style>
            body{
                text-align: center;
            }
        </style>
    </head>

    <body>

        <h2><strong>ADD COURSE</strong></h2>

        <form action="add_course.php" method="POST">

            <p> <strong>Course Name:</strong></p>
            <input type="text" name="crsname" placeholder="enter a course name" required>
            <p><strong>Course Code:</strong></p>
            <input type="text" name="crscode" placeholder="enter a course code" required><br><br>
            <button type="submit" name="sub">Add</button>

        </form>
        
    </body>
</html>

<?php

 $conn= mysqli_connect("localhost","root","","school");

 if(isset($_POST['sub'])){

    $coursename=$_POST['crsname'];
    $coursecode=$_POST['crscode'];

    $query="INSERT INTO course (course_name,course_code) VALUES('".$coursename."','".$coursecode."')";

    $results=mysqli_query($conn,$query);
 }

?>