<?php
include 'header.php';
if(!isset($_SESSION['username'])){
	header("location:login.php");
	exit();	
}
?>
<style>
body{
	background-color:#f2f2f2;
	text-align:center;
}
form{
	padding:10px;
	background-color:white;
	margin-left:33%;
	width:400px;
}
input{
	width:350px;
	height:35px;
	border-radius:6px;
	border:0.5px solid black;
}
input:hover{
	background-color:skyblue;
}
input[type=submit]{
	background-color:green;
	color:white;	
}
table{
	text-align:center;
	margin-left:18%;
}
th,tr,td{
	border:1px solid black;
}
label{
	font-size:20px;
	font-weight:bold;
	display:block;
	margin-bottom:8px;	
}
@media(max-width:600px){
	form{
		margin-left:0%;
		width:98%;
	}
	
	
}
</style>
<body>

<form action="insrt.php" method="post">
<label for="studentname">STUDENT NAME</label>
<input type="text" name="studentname"><br><br>
<label for="subject1">MATH MARKS</label>
<input type="text" name="subject1"><br><br>
<label for="subject2">ENGLISH MARKS</label>
<input type="text" name="subject2"><br><br>
<label for="subject3">SCIENCE MARKS</label>
<input type="text" name="subject3"><br><br>
<label for="subject4">HINDI MARKS</label>
<input type="text" name="subject4"><br><br>
<input type="submit">
</form>
<?php
include 'footer.php';
?>