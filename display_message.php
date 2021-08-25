<?php
        $conn= mysqli_connect("localhost","root","","school");
        $query="SELECT * FROM message ";
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
            <th>MESSAGE ID</th>
            <th>SENDER NAME</th>
            <th>SENDER EMAIL</th>
            <th>MESSAGE</th>
            <th>RECEIVED ON</th>
            <th>OPTION</th>
        </tr>
        
        <?php
        while($row = mysqli_fetch_array($result)) {
			
        ?>


        <tr>
           <td><?php echo $row["message_id"]; ?></td>
		       <td><?php echo $row["sender_name"]; ?></td>
           <td><?php echo $row["sender_email"]; ?></td>
		       <td><?php echo $row["sender_message"]; ?></td>
           <td><?php echo $row["received_on"]; ?></td>
           <td><a href="delete_message.php?message_id=<?php echo $row["message_id"]; ?>">Delete</a></td>
    

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
