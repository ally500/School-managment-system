<?php
$conn= mysqli_connect("localhost","root","","school");

$id=$_GET['results_id'];

?>



<!DOCTYPE html>
<html>
    <head>
        <title>Add marks</title>
        <style>
            body{
                text-align: center;
            }
        </style>
    </head>

    <body>

        <h2><strong>ADD CLASS</strong></h2>
        
        <form action="add_marks.php" method="POST">
        
            <p> <strong>Students Name:</strong></p>
            <?php
            $query="SELECT * FROM class_results WHERE results_id='$id'";
            $result=mysqli_query($conn,$query);
    
            $row=mysqli_fetch_array($result);
            ?>
            <input type="hidden" name="rest_id" class="txtField" value="<?php echo $row['results_id']; ?>">
            <input type="text" name="stu" value="<?php echo $row['students_name']; ?>" required>
            <p><strong>Marks %:</strong></p>
            <input type="text" name="mark" value="<?php echo $row['marks']; ?>" required><br><br>
            
            <button type="submit" name="sub">ADD MARKS</button>
        </form>        
        
    </body>
</html>          

<?php
        if(isset($_POST['sub'])){

            $conn= mysqli_connect("localhost","root","","school");
            
            $id=$_POST['rest_id'];

            $mrk=$_POST['mark'];
            

            $query="UPDATE class_results SET marks='".$mrk."' WHERE results_id='$id'";



            $results=mysqli_query($conn,$query);


            if($results){
                
                header("location: display_class_results.php");
            }
            


        }


        
   ?>
















