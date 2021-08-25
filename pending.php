<?php
        $conn= mysqli_connect("localhost","root","","school");
        $query="SELECT * FROM requests ";
        $result=mysqli_query($conn,$query);
?>


<!DOCTYPE html>
<html>
<title></title>
<style>
 table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
    }  
      th, td {
         padding: 15px;
    }
</style>

<body>
<?php
if (mysqli_num_rows($result) > 0) {
?>
    
<table>

   <tr>
   <th>Email</th>
   <th>Message</th>
   <th>Date</th>
   <th>Option</th>
   </tr>

   <?php
        while($row = mysqli_fetch_array($result)) {
			
        ?>

   <tr>
   <td><?php echo $row["email"]; ?></td>
   <td><?php echo $row["message"]; ?></td>
   <td><?php echo $row["date"]; ?></td>
   <td><a href="accept.php?requestID=<?php echo $row["requestID"]; ?>">Accept</a> ||
   <a href="reject.php?requestID=<?php echo $row["requestID"]; ?>"> Reject</a></td>
   </tr>

<?php
 }
?>
</table>

<?php
 }else{
    echo "No Pending Requests.";
}
 ?>
<br/><br/>
<a href="admin.html">Back</a>
</body>
</html>