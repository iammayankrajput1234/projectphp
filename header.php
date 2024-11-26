<?php
session_start();
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>header</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
    <style>
      
      .navbar-school-name {
        font-size: 18px; 
        color: blue;
        font-weight: bold;
		
      }
	  img{
		  width:30%;
		  
	  }
  .navbar-brand{
	margin:0px;
	padding:0px;
}
      @media (min-width: 768px) {
        .navbar-school-name {
          font-size: 30px; 
        }
      }

      @media (max-width: 767.98px) {
        .navbar-school-name {
          text-align: center;
          margin-top: 10px;
        }
		/*.navbar-brand{
			margin-left:20%;
		}*/
		.navbar-toggler{
			margin-left:auto;
			margin-right:auto;
		}
.navbar>.container-fluid{
	display:flex;
	flex-direction:column;
}
      }
    </style>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="school.jfif"></a>
	 <span class="navbar-school-name mx-auto">AB INTERNATIONAL SCHOOL</span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="phpdatabasemarksheet.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
       <?php if(isset($_SESSION['username'])):?>
	   <li class="nav-item">
	   <span class="navbar-text ms-3 ">
	   welcome<br><span style="margin-left:15px;"><?php echo($_SESSION['username']);?></span>
	   </span>
	   </li>
	   <li class="nav-item ms-3">
	   logout<br><a href="logout.php" style="margin-left:8px;"><img src="logout jpg.jpeg" style="width:20px;"></a>
	   </li>
	      <?php endif; ?>
		  
      </ul>
    </div>
  </div>
</nav>
