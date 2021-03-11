<?php 
	session_start();
 ?>

</body>
</html>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="finalwork.css">
</head>
<body>
	<div class="container mt-5">
		<h1><i>Akash<sup> Fashion</sup></i></h1><br><br><br>

	<form method="post" action="">


		<table class="table table-bordered table-striped table-hover">


					<center><b><h2>LOGIN HERE</h2></b></center>
					<table border="3" align="center" cellpadding="25">
						<tr>

					<td align="right"><b>EMAIL</b></td>
					<td><input type="text" name="email" placeholder="Enter your email" required/>
						
					</td>
						</tr>

					<td align="right"><b>PASSWORD</b></td>
					<td><input type="password" name="password" placeholder="Enter your password" required/>
						<div style='color: red; font-size: 20px;' class='login-output' ></div>

					</td>
						</tr>

						<tr>
					<td colspan="2" align="center"><input type="submit" name="Login" value="Login" required/></td>
				</tr>
				
			</table>
			
		</form>
		<center><a href="mainpage.php" button class="btn btn-warning">go back</a>
	</div>
	<!-- comment -->


					

</body>
<?php


if (isset($_POST['Login'])) {
	$email= $_POST['email'];
	$password= $_POST['password'];

	$connection= mysqli_connect('localhost', 'root', '', 'akash');
	$query= "select * from users where email= '$email' and password= '$password'";
	$result= mysqli_query($connection, $query);

	if ($result){
		if ($result->num_rows==0){
		// echo "incorrect email or password";
		echo "<script>

		document.querySelector('.login-output').innerText = 'wrong email or password'
		

		

		</script>";
	}

	else{
		while ($row= mysqli_fetch_array($result)) {
			$_SESSION['email']= $row['email'];
			$_SESSION['id']= $row['id'];
			$_SESSION['password']= $row['password'];
		}

		header('location:order02.php');
	}


}
}

?>


</html>

