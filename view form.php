<?php
include 'header.php';
?>
<style>
body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            max-width: 400px;
            width: 100%;
			margin:80px 0px 140px 380px;
        }
        label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
        }
        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
		@media(max-width:600px){
			form{
				margin-left:0px;
				margin-bottom:50px;	
			}
		}
</style>
<body>
<form action="viewresult.php" method="get">
<label for="studentid" >STUDENT ID</label>
<input id="studentid" name="studentid"><br>
<input type="submit" value="view result">
</form>
<?php
include 'footer.php';
?>