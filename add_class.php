<?php

 $conn= mysqli_connect("localhost","root","","school");
 $message="";

 if(isset($_POST['sub'])){

    $clsname=$_POST['clsname'];
    $clscode=$_POST['clscode'];
    $clstus=$_POST['status'];

    $query="INSERT INTO class (class_name,class_code,class_status) VALUES('".$clsname."','".$clscode."','".$clstus."')";

    $results=mysqli_query($conn,$query);
    if( $results){
        $message="class added successfully!";
    }
 }

?>





<!DOCTYPE html>
<html>
    <head>
        <title>add class</title>
        <style>
            body{
                text-align: center;
            }
        </style>
    </head>

    <body>

        <h2><strong>ADD CLASS</strong></h2>

        <form action="add_class.php" method="POST">

            <p> <strong>class Name:</strong></p>
            <input type="text" name="clsname" placeholder="enter a class name" required>
            <p><strong>Class Code:</strong></p>
            <input type="text" name="clscode" placeholder="enter a class code" required><br><br>
            <p><strong>Class Status:</strong></p>
            <select name="status">
               <option value=""></option>
               <option value="1">Enable</option>
               <option value="2">Disable</option>
            </select><br><br>
            <button type="submit" name="sub">Add</button>

        </form><br><br>
        <strong><?php echo $message ;?></strong>
        
    </body>
</html>

