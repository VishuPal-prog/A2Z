<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<style>
 body{
	 background-color:black;
 }

 .s{
	 margin-left:400px;
     margin-right:400px;
	 border-style:solid;
	 border-color:white;
	 padding-left:180px;
	 padding-bottom:50px;
 }
 fieldset{
	 color:white;
 }
 nav{
	 margin-bottom:2%;
	transition:.3s;
 }
 nav:hover{
	  box-shadow:0px 0px 10px 10px red;
 }
form:hover{
	 box-shadow:0px 0px 10px 10px red;
}
 button{
	 text-align:center;
	 padding-right:134px;
 }
 li{
	 list-style:none;
 }
 .navbar-nav li a{
	 padding-right:4.5em;
 }
 </style>	
    
  </head>
  <body>
  
  <!-- Logo -->
  <div class="container">
<div class="row">
<div class="col-md-1 col-3"><img src="logo.png"></div>
<div class="col-6 col-md-10 h1"><marquee behaviour="alternate" scrollamount="15%"><h1 style="color:red "><b>A2Z</b></h1></marquee></div> 
<div class="col-md-1 col-3 logo"><img src="logo.png"></div> 
 </div>
 </div>
     <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
 <a class="navbar-brand" href="index.php"><img src="logon.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ">
      <li class="nav-item">
  <a href="home.php?name=electronic">Electronic</a></li>
  <li class="nav-item">
  <a href="home.php?name=men">Men</a></li>
  <li class="nav-item">
  <a href="home.php?name=women">Women</a></li>
  <li class="nav-item">
  <a href="home.php?name=kids">Kids</a></li>
  <li class="nav-item">
  <a href="home.php?name=sports">Sports</a></li>
  <li class="nav-item">
  <a href="home.php?name=home">Home</a></li>
  <li class="nav-item">
  <a href="home.php?name=mobile">Mobile</a></li>
  
  
<li class="nav-item">
<a href="login.php">Login</a></li>
		</ul>
		
		
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
  </div>
</nav>

<form class="s" action="" method="POST">
<fieldset>
<legend>
<h1 style="color:white">Welcome</h1>
</legend>
<label>UserName :</label><br><br>
<input type="text" name="user"><br><br>
<label>Email :</label><br><br>
<input type="text" name="email"><br><br>
<label>Mobile :</label><br><br>
<input type="text" name="mob"><br><br>
<label>Password :</label><br><br>
<input type="password" name="pass"><br><br>
<input type="submit" name="signup"><br>

</fieldset>
</form>

<?php
$con=mysqli_connect("localhost","root","","a2z");

if(isset($_POST['signup']))
{   
	$i=1;
	$name=$_POST['user'];
	$email=$_POST['email'];
	$mob=$_POST['mob'];
	$pass=$_POST['pass'];
	$qu="select id from user ";
	$q=mysqli_query($con,$qu);
	while($row=$q->fetch_assoc())
	{
		$i=$i+1;
	}
	$query="insert into user values('$i','$name','$email','$mob','$pass')";
	$query_run=mysqli_query($con,$query);
	
	if($query_run)
	{
		$_SESSION["id"]=$name;
		$_SESSION["mob"]=$mob;
		header("Location: http://localhost/a2z/index.php");
		exit;
	}
	else{
		header("Location: http://localhost/a2z/signup.php");
		exit;
	}
}
   
?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>
