<?php
include'header.php';
?>
<style>
.dropdown-menu {
      background-color: #f8f9fa;
      border: 1px solid #ddd;
       
      border-radius: 5px;
	   min-width: 110px;
    }
.dropdown-menu li {	
      font-weight: bold;
    }
	
	 .dropdown-menu .dropdown-item {
      color: #007bff; 
      padding: 8px 10px; 
	  font-size:14px;
    }
	.dropdown-menu .dropdown-item:hover {
      background-color: #ccc;
      color: #0056b3; 
    }
	.container{
		margin-left:0px;
	}
	
	
	.you {
    display: flex;
    gap: 10px;
    margin-top: 20px;
  }
  .btn{
	  background-color:#f9f9f9;
	  color:black;
	  border: 1px solid #ccc;
  }
.btn:hover{
	background-color: #e9ecef;
	color:black;
}
  .you > div {
	margin-left:11%;
	margin-right:2%;
    flex: 1;
    padding: 30px;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    background-color: #f9f9f9;
    text-align: center;
  }
  .you > div:hover {
    background-color: #e9ecef;
    box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
    cursor: pointer;
  }

 @media (max-width: 600px){
	 .you{
		 display:flex;
		 flex-direction:column;
		 margin-right:20px;
		 
	 }
 }
</style>
<div class="container ">
  <div class="dropdown" >
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
      MENU
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <li><a class="dropdown-item" href="addstudent.php">ADD STUDENTS</a></li>
      <li><a class="dropdown-item" href="phpdatabasemarksheet.php">HOME</a></li>
      <li><a class="dropdown-item" href="#">CONTACT</a></li>
      <li><a class="dropdown-item" href="#">HELP</a></li>
	</ul>
  </div>
</div>
<div class="you">
<div class="start">
<div class="1st">
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="students";
$contt=mysqli_connect($servername,$username,$password,$dbname);
if(!$contt){
	die ("error");
}
$sql="SELECT COUNT(*) AS student_count FROM studentsmarksheet";
$result=mysqli_query($contt,$sql);
if($result){
	$row=mysqli_fetch_assoc($result);
	$studentdata=$row['student_count'];
	echo "<h3>".$studentdata."</h3>";
}else{
	echo"error".mysqli_error;
}
mysqli_close($contt);
?>
</div>
<div class="2nd">
<h2>TOTAL STUDENTS</h2>
</div>
</div>
<div class="run">
<div class="3rd">
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="students";
$contt=mysqli_connect($servername,$username,$password,$dbname);
if(!$contt){
	die ("error");
}
$sql="SELECT COUNT(*) AS student_count FROM studentsmarksheet WHERE SUBJECT_1<33||SUBJECT_2<33||SUBJECT_3<33||SUBJECT_4<33||TOTAL_MARKS<132";
$result=mysqli_query($contt,$sql);
if($result){
	$row=mysqli_fetch_assoc($result);
	$studentdatas=$row['student_count'];
	echo "<h3>".$studentdatas."</h3>";
}else{
	echo"error".mysqli_error;
}
mysqli_close($contt);
?>
</div>
<div class="4th">
<h2>FAIL STUDENTS</h2>
</div>
</div>
</div>
<div class="you">
<div class="stop">
<div class="5th">
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="students";
$contt=mysqli_connect($servername,$username,$password,$dbname);
if(!$contt){
	die ("error");
}
$sql="SELECT COUNT(*) AS student_count FROM studentsmarksheet WHERE SUBJECT_1>=33 AND SUBJECT_2>=33 AND SUBJECT_3>=33 AND SUBJECT_4>=33 AND TOTAL_MARKS>=132";
$result=mysqli_query($contt,$sql);
if($result){
	$row=mysqli_fetch_assoc($result);
	$studentdatas=$row['student_count'];
	echo "<h3>".$studentdatas."</h3>";
}else{
	echo"error".mysqli_error;
}
mysqli_close($contt);
?>
</div>
<div class="6th">
<h2>PASS STUDENTS</h2>
</div>
</div>
<div class="fire">
<div class="dk">
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="students";
$contt=mysqli_connect($servername,$username,$password,$dbname);
if(!$contt){
	die ("error");
}
$sql="SELECT COUNT(*) AS student_count FROM studentsmarksheet WHERE SUBJECT_1>=80 AND SUBJECT_2>=80 AND SUBJECT_3>=80 AND SUBJECT_4>=80 AND TOTAL_MARKS>=320";
$result=mysqli_query($contt,$sql);
if($result){
	$row=mysqli_fetch_assoc($result);
	$studentdatas=$row['student_count'];
	echo "<h3>".$studentdatas."</h3>";
}else{
	echo"error".mysqli_error;
}
mysqli_close($contt);
?>
</div>
<div class="6th">
<h2>TOPPERS</h2>
</div>
</div>
</div>
<?php
include 'footer.php';
?>