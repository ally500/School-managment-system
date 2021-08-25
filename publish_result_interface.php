<?php
        $conn= mysqli_connect("localhost","root","","school");
        $query="SELECT ac.StudentID,ac.FirstName,ac.LastName,sub.subject_id,sub.subject_name,
                c.class_name,stm.marks,stm.marks_status
        FROM accounts AS ac
        INNER JOIN student_marks as stm ON ac.StudentID=stm.StudentID
        INNER JOIN subject as sub ON sub.subject_id=stm.subject_id
        INNER JOIN class as c ON c.class_id=stm.class_id";
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
            <th>SUBJECT NAME</th>
            <th>MARKS</th>
            <th>STATUS</th>
            <th>CHANGE STATUS</th>

        </tr>
        
        <?php
        while($row = mysqli_fetch_array($result)) {
			
        ?>


        <tr>
           <td><?php echo $row["StudentID"]; ?></td>
		       <td><?php echo $row["FirstName"]; ?></td>
		       <td><?php echo $row["LastName"]; ?></td>
               <td><?php echo $row["class_name"]; ?></td>
               <td><?php echo $row["subject_name"]; ?></td>
               <td><?php echo $row["marks"]; ?></td>
               <td>
                   <?php
                     if($row['marks_status']==1)
                         {
                            echo"<p>Enable</>";
                         }else 
                         {
                            echo"<p>Disable</>";
                          }
                    ?>
               </td>
    
               <td><a href="enable_marks.php?StudentID=<?php echo $row["StudentID"];?>">Enable</a> ||
                   <a href="disable_marks.php?StudentID=<?php echo $row["StudentID"]; ?>">Disable</a></td>

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