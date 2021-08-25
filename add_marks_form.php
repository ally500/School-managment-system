<?php

$conn=mysqli_connect("localhost","root","","school");

$id=$_GET['StudentID'];

$message="";
$message1="";
$message2="";

  if(isset($_POST['sub'])){

    $studentid=$_POST['stdid'];
    $classid=$_POST['clsid'];
    $subjectid=$_POST['subid'];
    $studentMarks=$_POST['stdmarks'];

    $check="SELECT StudentID,subject_id from student_marks where StudentID = '$studentid'
    && subject_id= '$subjectid'";
            
    $res=mysqli_query($conn,$check);

    if(mysqli_num_rows($res) == 1){

      $message2="Marks have already Added!";

    }else{
        $query="INSERT INTO student_marks (StudentID,subject_id,marks,class_id) 
        VALUES('$studentid','$subjectid',' $studentMarks','$classid')";

        $results=mysqli_query($conn,$query);
    
        if($results){

            $message="Marks Added successfully!"; 

        }else{
            $message1="Unknown error occured!" or (mysqli_error($conn));
        }

    }


    }



?>


<!DOCTYPE html>
<html>
    <head>
        <title>Add Marks For Student</title>
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

        <h2><strong>ADD MARKS</strong></h2>

        <form action="" method="POST">
        <div>
        <h3><?php echo $message;?></h3><h3><?php echo $message1;?></h3><h3><?php echo $message2;?></h3>
            <p> <strong>Student Name:</strong></p>
            <?php
            $conn= mysqli_connect("localhost","root","","school");
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
                <p><strong>class Name:</strong></p> 
            </label>
        <select name="clsid">
            <?php
            $conn= mysqli_connect("localhost","root","","school");
            $query = "SELECT ac.StudentID,c.class_id,c.class_name

            FROM accounts AS ac
            INNER JOIN student_class AS sc ON ac.StudentID = sc.StudentID
            INNER JOIN class AS c ON c.class_id = sc.class_id
            WHERE ac.StudentID='$id'";
            $results=mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($results))
            {
            ?>
            <option value="<?php echo $row["class_id"]; ?>"><?php echo $row["class_name"]; ?></option>
            <?php
            }
            ?>     
        </select>
        </div><br>
        <div>
        <label>   
                <p><strong>Subject Name:</strong></p> 
            </label>
        <select name="subid">
            <?php
            $conn= mysqli_connect("localhost","root","","school");
            $query = "SELECT ac.StudentID,c.class_id,sub.subject_id,
            sub.subject_name

            FROM accounts AS ac
            INNER JOIN student_class AS sc ON ac.StudentID = sc.StudentID
            INNER JOIN class AS c ON c.class_id = sc.class_id
            INNER JOIN subject as sub ON c.class_id= sub.class_id
            WHERE ac.StudentID='$id'";
            $results=mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($results))
            {
            ?>
            <option value="<?php echo $row["subject_id"]; ?>"><?php echo $row["subject_name"]; ?></option>
            <?php
            }
            ?>     
        </select>
        </div><br>
        <div>
        <p> <strong>Marks:</strong></p>
        <input type="number" name="stdmarks" required>
        </div><br>
            <button type="submit" name="sub">Add</button>

        </form><br><br>
        <button><a href="user.html">BACK TO DASHBOARD</a></button>
    </body>
</html>
