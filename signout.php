<?php
include 'header.php';
?>
<style>

	  body {
        text-align: center;
        background-color: #f3f3f3; 
        font-family: Arial, sans-serif;
        color: #333;
        margin: 0;
        padding: 0;
    }
    h1 {
        color: black;
        font-size: 36px;
        margin-top: 20px;
    }
    form {
        background-color: #ffffff;
        border: 2px solid ;
        border-radius: 8px;
        width: 350px;
        margin: 20px auto; 
        padding: 30px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); 
    }
    label {
        display: block;
        font-weight: bold;
        color: black;;
        font-size: 20px;
        margin-bottom: 4px;
        
    }
    input[type="text"], input[type="password"] {
        width: 90%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #4fc3f7;
        border-radius: 5px;
        background-color: #e1f5fe; 
        font-size: 16px;
    }
    input[type="submit"] {
        background-color: #0288d1;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 18px;
        cursor: pointer;
        transition: background-color 0.3s ease; 
    }
    input[type="submit"]:hover {
        background-color: #0277bd;
    }
	button{
		width:30%;
		background-color: #4CAF50;
		height:40px;
		border-radius:8px;
	}
	a{
		text-decoration:none;
		color:white;
		font-size:16px;
	}
</style>
<body>
<h1>SIGN UP</h1>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
<label for="enter">ENTER NAME</label><br>
<input type="text" name="enter"><br>
<label for="pass">PASSWORD</label><br>
<input type="password" name="pass"><br><br>
<input type="submit" value="SIGN UP ">
</form>
<button><a href="login.php">LOGIN</a></button>
</body>
</html>
<?php
$servername="localhost";
$usernamedb="root";
$password="";
$dbname="students";
$contt=mysqli_connect($servername,$usernamedb,$password,$dbname);
if(!$contt){
	die("connection failed");
} 
$error="";
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$username=$_POST["enter"];
$password=$_POST["pass"];

if(empty($username)||empty($password)){
echo "<h2 style='color:red;'>please fill the box </h2>";
}
else{
	$check="SELECT * FROM enteries WHERE USERNAME='$username' AND PASSWORD='$password'";
$result=mysqli_query($contt,$check);
if(mysqli_num_rows($result)>0){
echo"<h2 style='color:red;'>USERNAME IS ALREADY EXIST</h2>";
}	else{
	$sql="INSERT INTO enteries(USERNAME,PASSWORD)
VALUES('$username','$password')";
if(mysqli_query($contt,$sql)){
	echo "<h2 style='color:green;'>SIGN IN SUCCESSFULL</h2>";
}
ELSE{
	echo "error".$sql."<br>".mysqli_error($contt);
}
 }
 }
 }
mysqli_close($contt);
?>