<?php

 $conn= mysqli_connect("localhost","root","","school");

 $message="";

 if(isset($_POST['sub'])){

    $yername=$_POST['yrname'];
   

    $query="INSERT INTO academic_year (year_name) VALUES('".$yername."')";

    $results=mysqli_query($conn,$query);

    if($results){

        $message="Year Added successfully!";

    }
 }

?>


<!DOCTYPE html>
<html>
    <head>
        <title>add year</title>
        <style>
            body{
                text-align: center;
            }
        </style>
    </head>

    <body>

        <h2><strong>ADD YEAR</strong></h2>

        <form action="" method="POST">

            <p> <strong>Year Name:</strong></p>
            <input type="text" name="yrname" placeholder="enter a year name" required>
        <!--
            <p><strong>Year Code:</strong></p>
            <input type="text" name="yrcode" placeholder="enter a year code" required><br><br>
        -->
            <button type="submit" name="sub">Add</button>

        </form><br>


        <?php echo$message; ?>
    </body>
</html>

