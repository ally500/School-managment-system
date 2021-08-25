<?php
        $conn= mysqli_connect("localhost","root","","school");
        $query="SELECT * FROM course ";
        $result=mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>display_student_course.php
  <style>
      table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
    }  
      th, td {
         padding: 15px;
    }
      
  </style>
</head>

<body>
<?php
if (mysqli_num_rows($result) > 0) {
?>

    <table>
        <tr>
            <th>COURSE ID</th>
            <th>COURSE NAME</th>
            <th>COURSE CODE</th>
            <th>OPTION</th>
        </tr>
        
        <?php
        while($row = mysqli_fetch_array($result)) {
			
        ?>


        <tr>
           <td><?php echo $row["course_id"]; ?></td>
		       <td><?php echo $row["course_name"]; ?></td>
		       <td><?php echo $row["course_code"]; ?></td>
           <td><a href="update_course.php?course_id=<?php echo $row["course_id"]; ?>">Update</a> ||
           <a href="delete_course.php?course_id=<?php echo $row["course_id"]; ?>">Delete</a></td>
    

        </tr>
        <?php
        }
        ?>


    </table><br><br>

    <button><a href="admin.html">BACK ADMIN</a></button>

    <?php
      }
    ?>
    
</body>
</html>