<?php
session_start();
$name=$_SESSION["id"]; 
$mob=$_SESSION["mob"]; 
$id=$_GET['id'];
$con=mysqli_connect("localhost","root","","a2z");
$s="delete from cart where product_id='$id' and name='$name' and mob='$mob' ";
$query_run=mysqli_query($con,$s);
header("Location: http://localhost/a2z/cart.php");
		exit;
?>