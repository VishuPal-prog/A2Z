<?php
session_start();
if(isset($_SESSION["id"])){
if(isset($_GET['id'])){
$name=$_GET['id'];
$nam=$_SESSION["id"];
$mob=$_SESSION["mob"];
$con=mysqli_connect("localhost","root","","a2z");
$s="insert into cart values('$name','$nam','$mob')";
$query_run=mysqli_query($con,$s);
header("Location: http://localhost/a2z/cart.php");
		exit;
}
}
else
{
	header("Location: http://localhost/a2z/login.php");
		exit;
}
?>