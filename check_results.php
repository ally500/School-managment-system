<?php
        $conn= mysqli_connect("localhost","root","","school");
        $query="SELECT * FROM class_results";
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
            <th>RESULTS ID</th>
            <th>STUDENT NAME</th>
            <th>CLASS NAME</th>
            <th>MARKS %</th>
        </tr>
        
        <?php
        while($row = mysqli_fetch_array($result)) {
			
        ?>


        <tr>
           <td><?php echo $row["results_id"]; ?></td>
		       <td><?php echo $row["students_name"]; ?></td>
		       <td><?php echo $row["class_name"]; ?></td>
               <td><?php echo $row["marks"]; ?></td>
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