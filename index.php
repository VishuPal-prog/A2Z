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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <style>
 body{
	 background-color:black;
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
 .d{
	 height:100px;
	 width:100px;
     margin-left:25%;
	 margin-top:5%;
 }
 
 nav:hover{
	  box-shadow:0px 0px 10px 10px red;
 }
 li{
	 list-style:none;
 }
 .navbar-nav li a{
	 padding-right:4.5em;
 }
 
 
 
@media (max-width: 575.98px) { 
	.card{
		margin-left:7em;
	}
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



<a href="home.php?name=mobile"><h2 style="color:White">Mobile</h2></a><br><br>

<!-- Cards -->
<div class="container-fluid">
<div class="row">

<?php
$con=mysqli_connect("localhost","root","","a2z");
$sql="select * from product where type='mobile'";
$result=$con->query($sql);
$i=0;
if($result->num_rows > 0 )
{
	while($row=$result->fetch_assoc() and $i<4)
	{
		?>
		<div class="col-12 col-lg-3">
		<div class="card" style="width: 15rem;">
  <img class="d" src="<?php echo $row['img'] ?>">
  <div class="card-body">
    <h5 class="card-title"><?php echo "".$row["name"]?></h5>
    <p class="card-text">Model No' :<?php echo $row["model"]."<br>";?>Price :Rs.<?php echo $row["price"]."<br>";?>Country Origin :<?php echo $row["origin"]."<br>";?></p>
    <a href="car.php?id=<?php  echo $row["id"]; ?>" class="btn btn-primary" ac>Add to cart</a>
  </div>
</div>
</div>
		<?php
		$i++;
	}
}else{
	echo "0 result";
}

?>
</div>
</div>

<a href="home.php?name=electronic"><h2 style="color:White">Electronic</h2></a>

<!-- Cards -->
<div class="container-fluid">
<div class="row">

<?php

$sql="select * from product where type='electronic'";
$result=$con->query($sql);
$i=0;
if($result->num_rows > 0)
{
	while($row=$result->fetch_assoc() and $i<4)
	{
		?>
		<div class="col-12 col-lg-3">
		<div class="card" style="width: 15rem;">
  <img class="d" src="<?php echo $row['img'] ?>">
  <div class="card-body">
    <h5 class="card-title"><?php echo "".$row["name"]?></h5>
    <p class="card-text">Model No' :<?php echo $row["model"]."<br>";?>Price :<?php echo $row["price"]."<br>";?>Country Origin :<?php echo $row["origin"]."<br>";?></p>
    <a href="car.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Add to cart</a>
  </div>
</div>
</div>
		<?php
		$i++;
	}
}else{
	echo "0 result";
}

?>
</div>
</div>

<a href="home.php?name=men"><h2 style="color:White">Men</h2></a>

<!-- Cards -->
<div class="container-fluid">
<div class="row">

<?php

$sql="select * from product where type='men'";
$result=$con->query($sql);
$i=0;
if($result->num_rows > 0)
{
	while($row=$result->fetch_assoc() and $i<4)
	{
		?>
		<div class="col-12 col-lg-3">
		<div class="card" style="width: 15rem;">
  <img class="d" src="<?php echo $row['img'] ?>">
  <div class="card-body">
    <h5 class="card-title"><?php echo "".$row["name"]?></h5>
    <p class="card-text">Model No' :<?php echo $row["model"]."<br>";?>Price :<?php echo $row["price"]."<br>";?>Country Origin :<?php echo $row["origin"]."<br>";?></p>
    <a href="car.php?id=<?php echo $row["id"];?>" class="btn btn-primary">Add to cart</a>
  </div>
</div>
</div>
		<?php
		$i++;
	}
}else{
	echo "0 result";
}

?>
</div>
</div>

<a href="home.php?name=women"><h2 style="color:White">Women</h2></a>

<!-- Cards -->
<div class="container-fluid">
<div class="row">

<?php

$sql="select * from product where type='women'";
$result=$con->query($sql);
$i=0;
if($result->num_rows > 0)
{
	while($row=$result->fetch_assoc() and $i<4)
	{
		?>
		<div class="col-12 col-lg-3>
		<div class="card" style="width: 15rem;">
  <img class="d" src="<?php echo $row['img'] ?>">
  <div class="card-body">
    <h5 class="card-title"><?php echo "".$row["name"]?></h5>
    <p class="card-text">Model No' :<?php echo $row["model"]."<br>";?>Price :<?php echo $row["price"]."<br>";?>Country Origin :<?php echo $row["origin"]."<br>";?></p>
    <a href="car.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Add to cart</a>
  </div>
</div>
</div>
		<?php
		$i++;
	}
}else{
	echo "0 result";
}

?>
</div>
</div>


<a href="home.php?name=kids"><h2 style="color:White">Kids</h2></a>

<!-- Cards -->
<div class="container-fluid">
<div class="row">

<?php

$sql="select * from product where type='kids'";
$result=$con->query($sql);
$i=0;
if($result->num_rows > 0)
{
	while($row=$result->fetch_assoc() and $i<4)
	{
		?>
		<div class="col-12 col-lg-3">
		<div class="card" style="width: 15rem;">
  <img src="<?php echo $row['img'] ?>">
  <div class="card-body">
    <h5 class="card-title"><?php echo "".$row["name"]?></h5>
    <p class="card-text">Model No' :<?php echo $row["model"]."<br>";?>Price :<?php echo $row["price"]."<br>";?>Country Origin :<?php echo $row["origin"]."<br>";?></p>
    <a href="car.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Add to cart</a>
  </div>
</div>
</div>
		<?php
		$i++;
	}
}else{
	echo "0 result";
}

?>
</div>
</div>

<a href="home.php?name=Sports"><h2 style="color:White">Sports</h2></a>

<!-- Cards -->
<div class="container-fluid">
<div class="row">

<?php

$sql="select * from product where type='Sports'";
$result=$con->query($sql);
$i=0;
if($result->num_rows > 0)
{
	while($row=$result->fetch_assoc() and $i<4)
	{
		?>
		<div class="col-12 col-lg-3">
		<div class="card" style="width: 15rem;">
  <img class="d" src="<?php echo $row['img'] ?>">
  <div class="card-body">
    <h5 class="card-title"><?php echo "".$row["name"]?></h5>
    <p class="card-text">Model No' :<?php echo $row["model"]."<br>";?>Price :<?php echo $row["price"]."<br>";?>Country Origin :<?php echo $row["origin"]."<br>";?></p>
    <a href="car.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Add to cart</a>
  </div>
</div>
</div>
		<?php
		$i++;
	}
}else{
	echo "0 result";
}

?>
</div>
</div>

<a href="home.php?name=home"><h2 style="color:White">Home</h2></a>

<!-- Cards -->
<div class="container-fluid">
<div class="row">

<?php

$sql="select * from product where type='Home'";
$result=$con->query($sql);
$i=0;
if($result->num_rows > 0)
{
	while($row=$result->fetch_assoc() and $i<4)
	{
		?>
		<div class="col-12 col-lg-3">
		<div class="card" style="width: 15rem;">
  <img class="d" src="<?php echo $row['img'] ?>">
  <div class="card-body">
    <h5 class="card-title"><?php echo "".$row["name"]?></h5>
    <p class="card-text">Model No' :<?php echo $row["model"]."<br>";?>Price :<?php echo $row["price"]."<br>";?>Country Origin :<?php echo $row["origin"]."<br>";?></p>
    
	<a href="car.php?id=<?php  echo $row["id"]; ?>" class="btn btn-primary">Add to Cart</a>
  </div>
</div>
</div>
		<?php
	$i++;
	}
}else{
	echo "0 result";
}

?>
</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>