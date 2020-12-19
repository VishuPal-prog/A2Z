<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<style>
body{
	background-color:black;
}
legend{
	color:white;
}
label{
	color:white;
}

</style>	
  </head>
  <body>
  <!--Header-->
  <div class="container">
<div class="row">
<div class="col-md-1 col-3"><img src="logo.png"></div>
<div class="col-6 col-md-10 h1"><marquee behaviour="alternate" scrollamount="15%"><h1 style="color:red "><b>A2Z Market</b></h1></marquee></div> 
<div class="col-md-1 col-3 logo"><img src="logo.png"></div> 
 </div>
 </div>
 <!-- Add Product--> 
<div class="container">
<div class="row">
<div class="col-4">
<form action="" method="POST">
<fieldset>
<legend>Add Product</legend>
<label>Name :</label><br><input type="text" name="name"><br>
<label>Model NO' :</label><br><input type="text" name="model" ><br>
<label>Price :</label><br><input type="number" name="price"><br>
<label>ID :</label><br><input type="text" name="idd"><br>
<label>Origin :</label><br><input type="text" name="origin"><br>
<label>Type :</label><br><input type="text" name="typee"><br>
<label>Photo :</label><br><input type="file" id="img" name="img" accept="image/*"><br><br>
 <input type="submit" name="add">
</fieldset>
</form>
</div>
<div class="col-4">
<form action="" method="POST">
<fieldset>
<legend>Delete Product</legend>
<label>ID :</label><br><input type="text" name="del"><br><br>
<input type="submit" name="dele">
</fieldset>
</form>
</div>
<div class="col-4">
<legend>Update Product</legend>
<label>ID :</label><br><input type="text"><br><br>
<input type="submit">
</fieldset>
</form>
</div>
</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
<?php
$con=mysqli_connect("localhost","root","","a2z");

if(isset($_POST['add']))
{
	$name=$_POST['name'];
	$model=$_POST['model'];
	$price=$_POST['price'];
	$idd=$_POST['idd'];
	$origin=$_POST['origin'];
	$typee=$_POST['typee'];
	$img=$_POST['img'];
	$query="insert into product values('$name','$model','$price','$idd','$origin','$typee','$img',Now())";
	$query_run=mysqli_query($con,$query);
	if($query_run)
	{
		echo '<script type="text/javascript">alert("data saved")</script>';
	}
	else{
		echo '<script type="text/javascript">alert("data not saved")</script>';
	}
}
if(isset($_POST['dele']))
{
	$del=$_POST['del'];
	$query="delete from product where id='$del'";
	$query_run=mysqli_query($con,$query);
	if($query_run)
	{
		echo '<script type="text/javascript">alert("data deleted")</script>';
	}else{
		echo '<script type="text/javascript">alert("data not deleted")</script>';
	}
}
$a="select * from product order by id desc";
mysqli_query($con,$a);
?>