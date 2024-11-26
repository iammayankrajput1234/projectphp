<?php
include 'header.php';
if(!isset($_SESSION['username'])){
	header("location:login.php");
	exit();	
}
?>
<html>
<head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</title>
<style>
body{
	background-color:#f2f2f2;
	text-align:center;
}

table{
	text-align:center;
	margin-left:13%;
	 border-collapse: collapse;
      background: white;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
	
}
th,tr,td{
	 border: 1px solid #ddd;
      text-align: center;
      padding: 12px ;
}
label{
	font-size:20px;
	font-weight:bold;
	display:block;
	margin-bottom:8px;	
}
/*button{
	margin-top:10px;
	margin-left:10px;
	width:20%;
	background-color:green;
	color:white;
	font-size:30px;
	border-radius:3px;
	
}*/
 .ab{
      background: linear-gradient(90deg, #ff8a00, #e52e71);
      color: white;
      border: none;
      border-radius: 30px;
      padding: 15px 30px;
      font-size: 1.2em;
      font-weight: bold;
      text-transform: uppercase;
      cursor: pointer;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
      transition: all 0.3s ease-in-out;
    }

   .ab:hover {
      background: linear-gradient(90deg, #e52e71, #ff8a00);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
      transform: scale(1.05);
    }

    .ab:active {
      transform: scale(0.95);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }
.ab{
	text-decoration:none;
	color:white;
}
@media(max-width:600px){
	table{
		display:block;
		width:100%;
		overflow-x:auto;
		border-collapse:collapse;
		margin-left:0px;
	}
	button{
		width:97%;
		font-size:20px;
	}
}
</style>
</head>
<body>
<a  href="dashboard.php"><button class="ab">DASHBOARD</button></a>
<a  href="addstudent.php"><button class="ab">ADD STUDENT</button></a>
</body>
</html>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="students";
$contt=mysqli_connect($servername,$username,$password,$dbname);
if(!$contt){
die ("connection failed");
}
$sql="SELECT id,student_name,subject_1,subject_2,subject_3,subject_4,total_marks FROM studentsmarksheet where teacher_id=".$_SESSION['id'];
$result=mysqli_query($contt,$sql);
if (!$result) {
die("Error in SQL query: " . mysqli_error($contt));}
$passStudents=[];
$failStudents=[];
if(mysqli_num_rows($result)>0){
	while($rowe=mysqli_fetch_assoc($result)){
		if ($rowe["subject_1"] < 33 || $rowe["subject_2"] < 33 || $rowe["subject_3"] < 33 || $rowe["subject_4"] < 33||$rowe["total_marks"]<132) {
            $failStudents[] = $rowe;
        } else {
            $passStudents[] = $rowe;
        }
	}
	if (count($passStudents) > 0) {
        echo "<h2 style='color:green; margin-left:10px; margin-top:20px;'>Pass Students</h2>";
        echo "<table border='1'>
                <tr>
                    <th>STUDENT ID</th>
                    <th>STUDENT NAME</th>
                    <th>MATH</th>
                    <th>ENGLISH</th>
                    <th>SCIENCE</th>
                    <th>HINDI</th>
                    <th>TOTAL MARKS</th>
                    <th>ACTION</th>
                    <th>MARKSHEET</th>
                </tr>";

        foreach ($passStudents as $rowe) {
            echo "<tr>
                    <td>".$rowe["id"]."</td>
                    <td>".$rowe["student_name"]."</td>
                    <td>".$rowe["subject_1"]."</td>
                    <td>".$rowe["subject_2"]."</td>
                    <td>".$rowe["subject_3"]."</td>
                    <td>".$rowe["subject_4"]."</td>
                    <td>".$rowe["total_marks"]."</td>
                    <td><a href='edit.php?id=".$rowe["id"]."'>EDIT</a> |
                        <a href='delete.php?id=".$rowe['id']."' onclick='return confirmdelete()'>Delete</a>
                    </td>
                    <td><a href='viewresult.php?studentid=".$rowe['id']."'>VIEW</a></td>
                </tr>";
        }
        echo "</table>";
    }
    if (count($failStudents) > 0) {
        echo "<h2 style='color:red; margin-left:10px;'>Fail Students</h2>";
        echo "<table border='1'>
                <tr>
                    <th>STUDENT ID</th>
                    <th>STUDENT NAME</th>
                    <th>MATH</th>
                    <th>ENGLISH</th>
                    <th>SCIENCE</th>
                    <th>HINDI</th>
                    <th>TOTAL MARKS</th>
                    <th>ACTION</th>
                    <th>MARKSHEET</th>
                </tr>";

        foreach ($failStudents as $rowe) {
            echo "<tr>
                    <td>".$rowe["id"]."</td>
                    <td>".$rowe["student_name"]."</td>
                    <td>".$rowe["subject_1"]."</td>
                    <td>".$rowe["subject_2"]."</td>
                    <td>".$rowe["subject_3"]."</td>
                    <td>".$rowe["subject_4"]."</td>
                    <td>".$rowe["total_marks"]."</td>
                    <td><a href='edit.php?id=".$rowe["id"]."'>EDIT</a> |
                        <a href='delete.php?id=".$rowe['id']."' onclick='return confirmdelete()'>Delete</a>
                    </td>
                    <td><a href='viewresult.php?studentid=".$rowe['id']."'>VIEW</a></td>
                </tr>";
        }
        echo "</table>";
    }
} 



else
{
	echo "no record";
}
mysqli_close($contt);
?>
<script>
function confirmdelete(){
	return confirm("ARE U SURE YOU WANT TO DELETE THIS RECORD");
}
</script>
<?php
include 'footer.php';
?>