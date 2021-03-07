<?php
session_start();
if (isset($_SESSION['total'])) {
  $total=$_SESSION['total'];

}

?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
 	<style type="text/css">

 		.image{
 			width: 160px;
 		}

 		
 		.navbar-expand-lg{
      background-color: #212529 !important;
    }

    .nav-link{
      color: white !important;
    }




 	</style>
 	

 </head>
 <body>
 		<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#"></a>
   
        
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavA1tMarkup" aia-controls="navbarNavA1tMarkup"aria-expanded="false" aria-label="toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarNavA1tMarkup">
    	<div class="navbar-nav">
          <a class="nav-item nav-link active" href="mainpage.php">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link " href="itemz.php">
          	Shopping cart(
          		<?php
          		if (isset($_SESSION['items'])){
          			echo $_SESSION['items'];
          		}
          		


          	?>)</a>
          	<a class="nav-item nav-link" href="#">Total price

          		(<?php 
          			if (isset($_SESSION['total'])){
          				echo '#'. $_SESSION['total'];
          			
          			}
          			?>)</a>
  <a class="nav-item nav-link" href="initialize.php?p=<?=$total?>">check out</a>

          	
          </div>
      </div>

  </div>
</nav>

 
 <?php

echo "<div class='container'>"."<br>";
echo "<b><h3>Welcome to Akash Fashion Order segment</h3></b>";
echo "<i>Please make your order and thanks for choosing Akash wears</i>";


if (!isset($_SESSION['email'])) {
	header("location:login.php");


}


$connection= mysqli_connect('localhost', 'root', '', 'akash payment');

$query= "select * from pay";


$result= mysqli_query($connection, $query);

$count=0;

while ($row= mysqli_fetch_array($result)) {
	$image=$row['image_name'];
	$price=$row['price'];
  $product_name=$row['product_name'];
  $id=$row['id'];


	if ($count/3==0) {
		echo "<div class='row' p-3>";
	}
	echo '<div class="col-md-4">'."<br>";

	echo "<img src='{$image}'  class='image'>"."<br></br>";
	echo "$price"."<br>";
  echo "$product_name"."<br>";
	echo "<a href='cart.php?p={$id}' class='btn  btn-primary'>Add to cart</a><br>";





	echo "</div>";

	if ($count/3==0 && $count!==0) {
		echo "</div>";
	}

	$count++;







}




 ?>

 </body>
 </html>


