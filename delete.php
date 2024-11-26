<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="students";
$contt=mysqli_connect($servername,$username,$password,$dbname);
if(!$contt){
	die ("connection failed".mysqli_connect_error());
}
if(isset($_GET['id'])){
	$id=$_GET['id'];

$sql="DELETE FROM studentsmarksheet WHERE id=$id";
if(mysqli_query($contt,$sql)){
header("location:phpdatabasemarksheet.php");
exit();	
}
else{
	echo"error deleting record".mysqli_error($contt); 	
}}
else{
	echo"invalid id";
}

mysqli_close($contt);
?>