<?php
session_start();

if (isset($_SESSION['StudentID'])){
 
?>

<?php
$conn = mysqli_connect("localhost","root","","school");

$id=$_SESSION['StudentID'];

$query="SELECT ac.StudentID,ac.FirstName, ac.LastName,c.class_name,
course.course_name

FROM accounts AS ac
INNER JOIN student_class AS sc ON ac.StudentID = sc.StudentID
INNER JOIN class AS c ON c.class_id = sc.class_id
INNER JOIN student_course AS sco ON ac.StudentID = sco.StudentID
INNER JOIN course AS course ON course.course_id = sco.course_id

where ac.StudentID='$id' ";

$results=mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html>
<head>
<title>results</title>
<style>
body{
        padding: 60px;
}
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


<table>

<tr>
<th>ID</th>
<th>FIRST NAME</th>
<th>LAST NAME</th>
<th>COURSE</th>
<th>CLASS </th>

</tr>

<tr>
<?php
if (mysqli_num_rows($results) > 0) {
while($row = mysqli_fetch_array($results)) {
			
?>

<td><?php echo $row["StudentID"]; ?></td>
<td><?php echo $row["FirstName"];?></td>
<td><?php echo $row["LastName"];  ?></td>
<td><?php echo $row["course_name"];  ?></td>
<td><?php echo $row["class_name"]; ?></td>
</tr>
<?php
 }
}
?>
</table><br><br>

<table>

<tr>
<th>SUBJECT NAME</th>
<th>SUBJECT MARKS</th>
</tr>
<?php
$conn = mysqli_connect("localhost","root","","school");

$id=$_SESSION['StudentID'];

$query1="SELECT ac.StudentID,sub.subject_name,sm.marks
FROM accounts AS ac
INNER JOIN student_marks as sm on ac.StudentID=sm.StudentID
INNER JOIN subject as sub on sub.subject_id=sm.subject_id
 where ac.StudentID='$id' ";

$result=mysqli_query($conn,$query1);

?>
<tr>

<?php
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)) {
			
?>

<td><?php echo $row["subject_name"]; ?></td>
<td><?php echo $row["marks"];  ?></td>
</tr>
<?php
        }
         }
?>


</table><br><br>

<table>

<tr>
<th>AVERAGE OF MARKS</th>
</tr>
<?php
$id=$_SESSION['StudentID'];
$query2="SELECT AVG(marks) AS AverageMarks from student_marks
WHERE StudentID='$id'";
$resu=mysqli_query($conn,$query2);
while($row=mysqli_fetch_array($resu)){
?>

<tr>
<td><?php echo $row['AverageMarks']; ?></td>
</tr>
<?php
}
?>

</table><br><br>
<button><a href="welcome.php">BACK HOME</a></button>


</body>
</html>

<?php

}else{
     header("Location: login_form.php");
     exit();
}
 ?>