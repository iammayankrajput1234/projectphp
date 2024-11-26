<?php
include 'header.php';
$servername="localhost";
$username="root";
$password="";
$dbname="students";
$contt=mysqli_connect($servername,$username,$password,$dbname);
if(!$contt){
die ("connection failed");
}
if($SERVER["REQUEST_METHOD"]="GET"){
	$student_id=$_GET['studentid'];
	$sql="SELECT id,student_name,subject_1,subject_2,subject_3,subject_4,total_marks
	FROM	studentsmarksheet WHERE id='$student_id'";
	$result=mysqli_query($contt,$sql);
	
	if(mysqli_num_rows($result)>0){
		$row=mysqli_fetch_assoc($result);
		  $pass = true;
        if($row['subject_1'] < 33 || $row['subject_2'] < 33 || $row['subject_3'] < 33 || $row['subject_4'] < 33){
            $pass = false;
		}
		echo"
		<style>
            body {
                font-family: Arial, sans-serif;
                margin: px;
            }
            h2 {
                color: #2e6da4;
                text-align: center;
            }
            p {
                text-align: center;
                font-size: 18px;
                color: #333;
            }
            table {
                width: 60%;
                margin: 20px auto;
                border-collapse: collapse;
            }
            th, td {
                padding: 10px;
                text-align: left;
                border: 1px solid #ddd;
            }
            th {
                background-color: #f2f2f2;
                color: #333;
            }
            td {
                background-color: #fafafa;
            }
            .total-row td {
                font-weight: bold;
                background-color: #f9f9f9;
            }
		h2,button{
			display:inline-block;
			vertical-align:middle;
			margin:0px;
		}
			button{
				margin-left:200px;
				background-color:red;
				height:40px;
				width:120px;
				border-radius:8px;
				font-size:15px;
			}
			h2{
				margin-left:400px;
			}
			a{
				color:black;
				text-decoration:none;
			}
			@media(max-width:600px){
				h2{
					margin-left:0px;
				}
				P{
					display:none;
				}
				button{
					margin-left:30%;
				}
			}
		</style>";
		echo"<body>";
		echo "<h2>AB INTERNATIONAL SCHOOL</h2>";
		echo "<button><a href='phpdatabasemarksheet.php'>check another</a></button>";
		echo "<P>STUDENT MARKS</P>";
		echo "<table border='1' cellpadding='9'>";
		echo "<tr><th>NAME OF THE STUDENT</th><td>".$row['student_name']."</td></tr>";
		echo "<tr><th>ROLL NO</th><td>".$row['id']."</td></tr>";
		echo "<tr><th>EXAMINATION DATE</th><td>21 JAN 2024</td></tr>";
		echo "</table>";
		echo "<table border='1' cellpadding='10'>";
		echo "<tr><th>S NO</th><th>SUBJECTS</TH><th>OUT OF</TH><TH>OBTAINED MARKS</TH></tr>";
		echo "<tr><td>1</td><td>MATH  </td><td>100</td><td>" .$row['subject_1']."</td></tr>";
		echo "<tr><td>2</td><td>ENGLISH  </td><td>100</td><td>" .$row['subject_2']."</td></tr>";
		echo "<tr><td>3</td><td>SCIENCE  </td><td>100</td><td>".$row['subject_3']."</td></tr>";
		echo "<tr><td>4</td><td>SST  </td><td>100</td><td>".$row['subject_4']."</td></tr>";
		echo "<tr><td></td><th>TOTAL MARKS  :</td><td>400</td><td>".$row['total_marks']."</td></tr>";
		echo "</table>";
		echo"</body>";
		
		if($pass){
            echo "<h3>Result: Pass</h3>";
        } else {
            echo "<h3>Result: Fail</h3>";
        }
		echo "<a  href='view form.php' style='color:blue';>CHECK ANOTHER BY ID</a>";
		}
else{
	echo "no result found";
}
}
mysqli_close($contt);
?>