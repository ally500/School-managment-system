<?php
        $conn= mysqli_connect("localhost","root","","school");
        $query="SELECT * FROM class ";
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
            <th>CLASS ID</th>
            <th>CLASS NAME</th>
            <th>CLASS CODE</th>
            <th>OPTION</th>
        </tr>
        
        <?php
        while($row = mysqli_fetch_array($result)) {
			
        ?>


        <tr>
           <td><?php echo $row["class_id"]; ?></td>
		       <td><?php echo $row["class_name"]; ?></td>
		       <td><?php echo $row["class_code"]; ?></td>
           <td><a href="update_class.php?class_id=<?php echo $row["class_id"]; ?>">Update</a> ||
           <a href="delete_class.php?class_id=<?php echo $row["class_id"]; ?>">Delete</a></td>
    

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