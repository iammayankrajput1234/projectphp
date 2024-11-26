
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="students";
$contt=mysqli_connect($servername,$username,$password,$dbname);
if(!$contt){
	die("connection faileD".mysqli_connect_error());
}
if(isset($_GET['id'])){
	$id=intval($_GET['id']);
$sql="SELECT * FROM studentsmarksheet WHERE id=$id";
$result=mysqli_query($contt,$sql);
if(mysqli_num_rows($result)==1){
	$row=mysqli_fetch_assoc($result);
	 $studentname = $row['STUDENT_NAME'];
    $subject1 = $row['SUBJECT_1'];
    $subject2 = $row['SUBJECT_2'];
    $subject3 = $row['SUBJECT_3'];
    $subject4 = $row['SUBJECT_4'];
}
else{
	echo "no record found";
	exit();
}
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$id=$_GET['id'];	
	$studentname=$_POST['studentname'];
	$subject1 = $_POST['subject1'];
	$subject2 = $_POST['subject2'];
    $subject3 = $_POST['subject3'];
    $subject4 = $_POST['subject4'];
	$total_marks=$subject1+$subject2+$subject3+$subject4;
	
	$sql="UPDATE studentsmarksheet SET student_name='$studentname',subject_1='$subject1',subject_2='$subject2',subject_3='$subject3'
	,subject_4='$subject4',total_marks='$total_marks' WHERE id=$id";
	if(mysqli_query($contt,$sql)){
		header("location:phpdatabasemarksheet.php");
		exit();
	}
	else{
		echo "error".mysqli_error($contt);
	}
}
mysqli_close($contt);
include 'header.php';
?>

<STYLE>
body{
	text-align:center;
	background-color:#f2f2f2;
}
label{
	display:block;
	font-size:30px;
	font-weight:bold;
	margin-bottom:6px;
}
form{
	padding:10px;
	background-color:white;
	margin-left:30%;
	width:400px;
	border-radius:14px;
}
input{
	width:300px;
	height:35px;
	border-radius:8px;
	border:1px solid black;
}
input:hover{
	background-color:skyblue;
}
input[type=submit]{
	background-color:green;
	color:white;	
}
@media(max-width:600px){
	form{
		margin-left:0px;
	}
}

</STYLE>
<body>
<form action="edit.php?id=<?php echo $id;?>" method="POST">
<label for="studentname">STUDENT NAME</label>
<input type ="text" name="studentname"  value="<?php echo isset($studentname) ? $studentname :'';?>"><br><br>
<label for="subject1">MATH</label>
<input type ="text" name="subject1" value="<?php echo isset($subject1) ? $subject1 : ''; ?>"><br><br>
<label for="subject2">ENGLISH</label>
<input type ="text" name="subject2" value="<?php echo isset($subject2) ? $subject2 : ''?>"><br><br>
<label for="subject3">SCIENCE</label>
<input type ="text" name="subject3" value="<?php echo isset($subject3) ? $subject3 : ''; ?>"><br><br>
<label for="subject4">HINDI</label>
<input type ="text" name="subject4" value="<?php echo isset($subject4) ? $subject4 : ''; ?>"><br><br>
<input type="submit" value="UPDATE">
</form>
<?php
include 'footer.php';
?>