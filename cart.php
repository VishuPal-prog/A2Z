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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<style>
 body{
	 background-color:black;
 }
nav{
	margin-bottom:30px;
}
 .card{
	 text-align:center;
	 margin-bottom:20%;
	 transition:.3s;
 }
 .card:hover{
	 box-shadow:0px 0px 10px 10px red;
 }
 h2{
	 text-align:center;
	 font-variant: small-caps;
 }
 nav:hover{
	  box-shadow:0px 0px 10px 10px red;
 }
 footer:hover{
	 box-shadow:0px 0px 10px 10px red;
 }
 .d{
	 height:100px;
	 width:100px;
     margin-left:25%;
	 margin-top:5%;
 }
 li{
	 list-style:none;
 }
 @media (max-width: 575.98px) { 
	.card{
		margin-left:7em;
	}
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
  <?php if(isset($_SESSION["id"])){  ?>
 <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     
 <?php echo $_SESSION["id"];
 $name=$_SESSION["id"]; 
 $i=0;
 $con=mysqli_connect("localhost","root","","a2z");
  $s="select product_id from cart where name='$name'";
  $q=$con->query($s);
  while($row=$q->fetch_assoc())
	{
		$i=$i+1;
	} 
	
	?>
 <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
		</li>
<li class="nav-item">
 <a href="cart.php"><i class="fa fa-shopping-cart" style="font-size:25px;"></i><?php echo $i; ?></a>
 </li>
 <?php
  }
else{  ?>
<li class="nav-item">
  <a href="login.php">Login</a></li>
<?php } ?>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<h2 style="color:Blue ">
<?php 


?></h2><br>
<h2 style="color:Blue ">YOUR CART</h2><br>
<!-- Cards -->
<div class="container-fluid">
<div class="row">
<?php
$total=0;
$nam=$_SESSION["id"];
$mob=$_SESSION["mob"];

$sql="select * from product where id= ANY(select product_id from cart where name='$nam' and mob='$mob')";
$result=$con->query($sql);
if($result->num_rows > 0)
{
	while($row=$result->fetch_assoc())
	{
		?>
		<div class="col-12 col-lg-3">
		<div class="card" style="width: 15rem;">
		<a href="del.php?id=<?php echo $row["id"]?>"><i class="fa fa-times-circle d-flex justify-content-end mr-2 mt-2" style="font-size:25px; "></i></a>
  <img class="d" src="<?php echo $row['img'] ?>">
  
  <div class="card-body">
    <h5 class="card-title"><?php echo "".$row["name"]?></h5>
    <p class="card-text">Model No' :<?php echo $row["model"]."<br>";?>Price :Rs.<?php $total=$total+$row["price"]; echo $row["price"]."<br>";?>Country Origin :<?php echo $row["origin"]."<br>";?></p>
    <a href="pgRedirect.php?Oid=<?php echo  "ORDS" . rand(10000,99999999)?>& Cid=<?php echo $_SESSION["id"] ?>& amn=<?php echo $row["price"]?> " class="btn btn-primary">BUY Now</a>
	
  </div>
</div>
</div>
		<?php
	}
}else{

}
$con->close();

?>

</div>
   
</div>
<footer class="page-footer font-small teal pt-4">
<div class="jumbotron jumbotron-fluid">
  <div class="container d-flex justify-content-center ">
    <h1><?php echo "5% discount on all products"; ?></h1>
	</div>
	<div class="container">
    <p><?php
echo "Price = ".$total ."<br>" ; 
echo "Discount = ". (5/100)*$total . "<br>";
$t=($total-(5/100)*$total);
echo "Total amount = ".$t;

?></p>
<a href="pgRedirect.php?Oid=<?php echo  "ORDS" . rand(10000,99999999)?>& Cid=<?php echo $_SESSION["id"] ?>& amn=<?php echo $t?> " class="btn btn-primary">BUY ALL</a>  </div>
</div>
<div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="http://localhost/a2z/"> A2Z.com</a>
  </div>
</footer>
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