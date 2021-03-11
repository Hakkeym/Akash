<!DOCTYPE html>
<html>
<head>
	<title>Akash Fashion</title>			
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="finalwork.css">
	
	<style>
.mySlides {display:none;}

.my-button{
	position: relative;
	top: -189px;
}
</style>

</head>
<body>
	<!-- <div class="container mt-5"> -->
		<!-- <i><strong><h2 class="h2"><a href="mainpage.php"><button class="btn btn-warning">Welcome to Akash Home Page</h2></button></a></h2></strong></i><br> -->

	<img class="mySlides" src="h04.jpg" style="width:100%;" height="750px;">
    <img class="mySlides" src="h02.jpg" style="width:100%" height="750px;">
    <img class="mySlides" src="h03.jpg" style="width:100%" height="750px;"> 
	

	

</div>
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>

	<center class='my-button'><a href="mainpage.php"><button class="btn btn-warning">Click to continue</h2></button></a></center>

		<!-- <a href="mainpage.php"><button class="btn btn-block">click to the main page</button></a><br><br> -->
	
	


	<!-- <creation of footer> -->
			<div class="footer2"><br>
				Akash Fashion Line All Rights Reserved.<br>
					Developed by Hakkeymshiru
					<br>
					<br>
			</div>






		

</body>
</html>