<?php
        $conn= mysqli_connect("localhost","root","","school");
        $query="SELECT ac.StudentID,ac.FirstName, ac.LastName, ac.email,ac.added_on,si.gender,si.birth_date,si.phone_number,
        co.country_name,p.province_name,ci.city_name
        FROM accounts AS ac 
        LEFT JOIN student_information AS si ON ac.StudentID = si.StudentID
        LEFT JOIN country AS co ON co.country_id = si.country_id
        LEFT JOIN province AS p ON p.province_id = si.province_id
        LEFT JOIN city AS ci ON ci.city_id = si.city_id";
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
            <th> ID</th>
            <th>FIRST NAME</th>
            <th>LAST NAME</th>
            <th>EMAIL</th>
            <th>GENDER</th>
            <th>BIRTH DATE</th>
            <th>PHONE</th>
            <th>COUNTRY</th>
            <th>PROVINCE</th>
            <th>CITY</th>
            <th>ADDED ON</th> 
            <th>EDIT</th>
            <th>STATUS</th>
            
        

        </tr>
        
        <?php
        while($row = mysqli_fetch_array($result)) {
			
        ?>


        <tr>
           <td><?php echo $row["StudentID"]; ?></td>
		       <td><?php echo $row["FirstName"]; ?></td>
		       <td><?php echo $row["LastName"]; ?></td>
               <td><?php echo $row["email"]; ?></td>
               <td><?php echo $row["gender"]; ?></td>
               <td><?php echo $row["birth_date"]; ?></td>
               <td><?php echo $row["phone_number"]; ?></td>
               <td><?php echo $row["country_name"]; ?></td>
               <td><?php echo $row["province_name"]; ?></td>
               <td><?php echo $row["city_name"]; ?></td>
               <td><?php echo $row["added_on"]; ?></td>
           <td><a href="update_student.php?StudentID=<?php echo $row["StudentID"]; ?>">edit</a></td>
           <td><a href="#?StudentID=<?php echo $row["StudentID"]; ?>">enable</a></td>
    

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