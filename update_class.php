<?php
$conn= mysqli_connect("localhost","root","","school");

$id=$_GET['class_id'];

?>



<!DOCTYPE html>
<html>
    <head>
        <title>Update class</title>
        <style>
            body{
                text-align: center;
            }
        </style>
    </head>

    <body>

        <h2><strong>UPDATE CLASS</strong></h2>
        
        <form action="update_class.php" method="POST">
        
            <p> <strong>Class Name:</strong></p>
            <?php
            $query="SELECT * FROM class WHERE class_id='$id'";
            $result=mysqli_query($conn,$query);
    
            $row=mysqli_fetch_array($result);
            ?>
            <input type="hidden" name="cls_id" class="txtField" value="<?php echo $row['class_id']; ?>">
            <input type="text" name="clsname" value="<?php echo $row['class_name']; ?>" required>
            <p><strong>Class Code:</strong></p>
            <input type="text" name="clscode" value="<?php echo $row['class_code']; ?>" required><br><br>
            
            <button type="submit" name="sub">UPDATE</button>
        </form>        
        
    </body>
</html>

<?php
        if(isset($_POST['sub'])){

            $conn= mysqli_connect("localhost","root","","school");
            
            $id=$_POST['cls_id'];

            $clsname=$_POST['clsname'];
            $clscode=$_POST['clscode'];


            $query="UPDATE class SET class_name='".$clsname."',class_code='".$clscode."' WHERE class_id='$id'";

            $results=mysqli_query($conn,$query);


            if($results){
                header("location: display_class.php");
            }
            


        }


        
   ?>
















