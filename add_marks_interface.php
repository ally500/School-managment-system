<?php
        $conn= mysqli_connect("localhost","root","","school");
        $query="SELECT ac.StudentID,ac.FirstName, ac.LastName,c.class_name

        FROM accounts AS ac
        INNER JOIN student_class AS sc ON ac.StudentID = sc.StudentID
        INNER JOIN class AS c ON c.class_id = sc.class_id; ";
        $result=mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
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
            <th>ID</th>
            <th>FIRST NAME</th>
            <th>LAST NAME</th>
            <th>CLASS NAME</th>
            <th>EDIT</th>
            <th>DELETE</th>

        </tr>
        
        <?php
        while($row = mysqli_fetch_array($result)) {
			
        ?>


        <tr>
           <td><?php echo $row["StudentID"]; ?></td>
		       <td><?php echo $row["FirstName"]; ?></td>
		       <td><?php echo $row["LastName"]; ?></td>
               <td><?php echo $row["class_name"]; ?></td>
           <td><a href="add_marks_form.php?StudentID=<?php echo $row["StudentID"]; ?>">ADD MARKS</a></td>
           <td><a href="student_view_marks.php?StudentID=<?php echo $row["StudentID"]; ?>">VIEW MARKS</a></td>
  
        </tr>
        <?php
        }
        ?>


    </table><br><br>

    <button><a href="user.html">BACK ADMIN</a></button>

    <?php
      }
    ?>
     
</body>
</html>