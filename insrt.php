<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="students";
$contt=mysqli_connect($servername,$username,$password,$dbname);
if(!$contt){
die ("connection failed");
}
$student_name=$_POST['studentname'];
$subject_1=$_POST['subject1'];
$subject_2=$_POST['subject2'];
$subject_3=$_POST['subject3'];
$subject_4=$_POST['subject4'];

$total_marks=($subject_1+$subject_2+$subject_3+$subject_4);
$sql="INSERT INTO studentsmarksheet(student_name,subject_1,subject_2,subject_3,subject_4,total_marks,teacher_id)
 VALUES('$student_name','$subject_1','$subject_2','$subject_3','$subject_4','$total_marks', '".$_SESSION['id']."')";
 
 if(mysqli_query($contt,$sql)){
	 echo "mark saved successfully";
	 header("location:phpdatabasemarksheet.php");
	 exit();
 }
 else{
	 echo "error".$sql."<br>".mysqli_error($contt);
 }
 mysqli_close($contt);
?>
<html>
<body>
<a href="phpdatabasemarksheet.php">ADD NEW STUDENTS DETAIL</a>
</body>
</html>