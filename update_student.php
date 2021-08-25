<?php
$conn= mysqli_connect("localhost","root","","school");
$message="";

$id=$_GET['StudentID'];

?>
<?php
        if(isset($_POST['sub'])){

            $conn= mysqli_connect("localhost","root","","school");
            
            $id=$_POST['stdnt_id'];

            $firstname=$_POST['firstname'];
            $lastname=$_POST['lastname'];
            $email=$_POST['email'];
            $gender=$_POST['gender'];
            $birthdate=$_POST['birthdate'];
            $phonenumber=$_POST['phonenumber'];
            $country=$_POST['country'];
            $province=$_POST['province'];
            $city=$_POST['city'];


            $query="UPDATE accounts SET FirstName='".$firstname."',LastName='".$lastname."',
            email='".$email."' WHERE StudentID='$id'";

            $results=mysqli_query($conn,$query);

            if($results){

                $query2="UPDATE student_information SET gender='".$gender."',birthdate='".$birthdate."',
                phone_number='".$phonenumber."',country_id=$country,province_id=$province ,city_id= $city
                 WHERE StudentID='$id'";
                 $res=mysqli_query($conn,$query2);
              if ($res){
                  $message="$firstname $lastname is updated successfull !";
              }

            }
            


        }


        
   ?>


<!DOCTYPE html>
<html>
    <head>
        <title>Update student</title>
        <style>
            body{
                padding: 80px;
            }
        </style>
    </head>

    <body>

        <h2><strong>UPDATE STUDENT</strong></h2>
        <p><?php echo $message ?></p>
        <form action="" method="POST">
        
            <p> <strong>first Name:</strong></p>
            <?php
              $query="SELECT ac.StudentID,ac.FirstName, ac.LastName, ac.email,si.gender,si.birth_date,si.phone_number,
              co.country_name,p.province_name,ci.city_name
              FROM accounts AS ac 
              LEFT JOIN student_information AS si ON ac.StudentID = si.StudentID
              LEFT JOIN country AS co ON co.country_id = si.country_id
              LEFT JOIN province AS p ON p.province_id = si.province_id
              LEFT JOIN city AS ci ON ci.city_id = si.city_id
              where ac.StudentID='$id'";
        
            $result=mysqli_query($conn,$query);
    
            $row=mysqli_fetch_array($result);
            ?>
            <input type="hidden" name="stdnt_id" class="txtField" value="<?php echo $row['StudentID']; ?>">
            <input type="text" name="firstname" value="<?php echo $row['FirstName']; ?>" required>
            <p><strong>Last Name:</strong></p>
            <input type="text" name="lastname" value="<?php echo $row['LastName']; ?>" required><br><br>
            
            <p><strong>Email:</strong></p>
            <input type="text" name="email" value="<?php echo $row['email']; ?>"><br><br>
            
            <p><strong>Gender</strong></p>
            <input type="text" name="gender" value="<?php echo $row['gender']; ?>" ><br><br>
           
            <p><strong>Birth Date:</strong></p>
            <input type="date" name="birthdate" value="<?php echo $row['birth_date']; ?>" ><br><br>
            
            <p><strong>Phone Number:</strong></p>
            <input type="number" name="phonenumber" value="<?php echo $row['phone_number']; ?>" ><br><br>

             <label><b>Country:</b></label><br>
                 <select name="country"><br>
                    <option value="">select Your country</option>
                         <?php
                            $conn= mysqli_connect("localhost","root","","school");
                            $query = "SELECT * FROM country";
                            $results=mysqli_query($conn, $query);
                            while($row = mysqli_fetch_array($results))
                            {
                            ?>
                                 <option value="<?php echo $row['country_id']; ?>"><?php echo $row['country_name']; ?></option>

                         <?php
                            }
                           ?>
         
                    </select><br><br><br>

         <label><b>Province:</b></label><br>
            <select name="province"><br>
                    <option value="">select New Province</option>
                         <?php
                            $conn= mysqli_connect("localhost","root","","school");
                            $query = "SELECT * FROM province";
                            $results=mysqli_query($conn, $query);
                            while($row = mysqli_fetch_array($results))
                            {
                            ?>
                                 <option value="<?php echo $row['province_id']; ?>"><?php echo $row['province_name']; ?></option>

                            <?php
                            }
                            ?>
         
                    </select><br><br><br>

        <label><b>City:</b></label><br>
            <select name="city"><br>
                    <option value="">select New City</option>
                         <?php
                            $conn= mysqli_connect("localhost","root","","school");
                            $query = "SELECT * FROM city";
                            $results=mysqli_query($conn, $query);
                            while($row = mysqli_fetch_array($results))
                            {
                            ?>
                                 <option value="<?php echo $row['city_id']; ?>"><?php echo $row['city_name']; ?></option>

                            <?php
                            }
                            ?>
         
                    </select><br><br><br>
            <button type="submit" name="sub">UPDATE</button>
        </form><br>       
        <button><a href="admin.html">BACK ADMIN</a></button>
    </body>
</html>


















