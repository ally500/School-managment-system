<?php
    $conn= mysqli_connect("localhost","root","","school");

    $id = $_GET['requestID'];
    $query = "select * from `requests` where `requestID` = '$id'; ";
        $result=mysqli_query($conn,$query);
    
        if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_array($result)) {


            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];
            $password = $row['password'];
            
                $query2 = "INSERT INTO `accounts` (`FirstName`, `LastName`, `email`, `user_password`,
             `user_type`) VALUES ('".$firstname."', '".$lastname."', '".$email."', '".$password."','user')";

             $done=mysqli_query($conn,$query2);

             if($done){

                $id=$_GET['requestID'];
                $query3 = "DELETE FROM `requests` WHERE `requestID` = '$id'";

                $res=mysqli_query($conn,$query3);
                if($res){
                    echo "Account has been accepted.";
                }else{
                    echo "Unknown error occured. Please try again.";
                }

             }
        
            }
             

           
        
    }else{
        echo "Error occured.";
    }
    
?>
<br/><br/>
<a href="pending.php">Back</a>