<?php
include 'header.php';
if(isset($_SESSION["username"])){
	header("location:phpdatabasemarksheet.php");
	exit();
}
$servername="localhost";
$usernamedb="root";
$password="";
$dbname="students";
$contt=mysqli_connect($servername,$usernamedb,$password,$dbname);
if(!$contt){
	die("connection failed");
} 
$sts="";	
$error="";
if($_SERVER['REQUEST_METHOD']=="POST"){
 $USERNAME = isset($_POST['username']) ? (string)$_POST['username'] : '';
    $PASSWORD = isset($_POST['password']) ? (string)$_POST['password'] : '';
	if(empty($_POST["username"])&&empty($_POST["password"])){
		$error="please fill the box";
	}
	else{
		 $USERNAME = mysqli_real_escape_string($contt, $USERNAME);
        $PASSWORD = mysqli_real_escape_string($contt, $PASSWORD);
			  $query = "SELECT * FROM ENTERIES WHERE USERNAME='$USERNAME' AND PASSWORD='$PASSWORD'"; 
              $result=mysqli_query($contt,$query);
				
        if($result&&mysqli_num_rows($result) >0){
			$row=mysqli_fetch_assoc($result);
			$userid = $row["ID"];
            $_SESSION["username"] = $USERNAME;
			$_SESSION["id"] = $userid;
            header("location:phpdatabasemarksheet.php");
            exit();
        } else {
            $sts = "Login failed: Invalid username or password."."<br>"."Please Sign in";
        }

		}
		
	}


?>
<html>
<style>
body{
	text-align:center;
	  background-color: #f3f3f3;
}
form{
	margin-top:30px;
	background-color:white;
	width:350px;
	margin-left:36%;
	border-radius:5px;
	height:50%;
	}
	label{
		margin-top:10px;
		
		margin-left:0px;
		font-size:20px;
	}
	 input {
      width: 90%;
      padding: 8px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 4px;
      box-sizing: border-box;
    }
     input[type="submit"]{
	     width: 90%;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
     
}
button{
	width:29%;
	height:35px;
	background-color:blue;
	color:white;
	border-radius:8px;
}
a{
	text-decoration:none;
	color:white;
}
@media(max-width:600px){
	form{
		margin-left:0px;
		width:99%;
		height:40%;
	}
	button{
		width:100%;
		height:6%;
	}
	h1{
		margin-top:30px;
	}
}
</style>
<body>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
<label for="username">USERNAME</label><br>
<input type="text" name="username"><br><br>
<label for="password">PASSWORD</label><br>
<input type="password" name="password"><br><br>
<input type="submit" value="LOG IN">
</form>
<button><a href="signout.php">SIGN IN</a></button>
<h2><?php echo $error?></h2>
<h3><?php echo $sts?></h3>
</body>
</html>