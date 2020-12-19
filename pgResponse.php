
<?php
session_start();
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.

?>
<html>
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
<div class="container d-flex justify-content-center ">
<form class="s" action="" method="POST">
<fieldset>
<legend>
<h1 style="color:red">INVOICE</h1>
</legend>
<?php
if($isValidChecksum == "TRUE") {
	
	?>
		<h6 style="color:white">
		<?php
	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		
		echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		foreach($_POST as $paramName => $paramValue) {
				echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>
</h6>
</fieldset>
</form>
</div>
</body>
</html>