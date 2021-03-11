
<!DOCTYPE html>
<html>
<head>
	<title>Order</title>

	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="finalwork.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.js">
	<link rel="stylesheet" type="text/css" href="finish.css">


	

</head>
<body>

	<!-- <div class="container mt-4"> -->

		<i><strong>Akash Fashion</strong></i><br><br>
		<img src="RandL.jpg" class="img03"><br><br>
	
<div class='container'>
				<h3>CREATE ACCOUNT</h3>
				<form method="post" action="">
					NAME: <input type="text" name="name" class="form-control" placeholder="Enter your name" required/>
					<div style='color: red; font-size: 15px;' class='login-output' ></div><br>
					EMAIL: <input type="email" name="email" class="form-control" placeholder="Enter your email" required/><div style='color: red; font-size: 15px;' class='login-output' ></div><br><br>
					COUNTRY: <input type="text" name="country" class="form-control" placeholder="Enter your country (optional)"><br>
					PASSWORD: <input type="password" name="password" class="form-control" placeholder="Enter your password"  required/><div style='color: red; font-size: 15px;' class='login-output' ></div><br><br>
					CONFIRM PASSWORD: <input type="password" name="cpassword" class="form-control" placeholder="Enter your confirm password "><div style='color: red; font-size: 15px;' class='login-output' ></div><br><br>
					<input type="submit" name="submit" class="btn btn-primary" value="Create Account"><br><br>
					<center><a href="mainpage.php" button class="btn btn-danger">go back</a>
	</center>
</form>
</div>








				







</body>
<?php

if (isset($_POST['submit'])) {
	
	$name= $_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];

	if ($name== '') {
		echo "<script>

		document.querySelector('.login-output').innerText = 'Enter your name'
		

		

		</script>";
	}

	elseif ($email=='') {
		echo "<script>

		document.querySelector('.login-output').innerText = 'Enter your email address'
		

		

		</script>";

	}

	elseif ($password=='') {
		echo "<script>

		document.querySelector('.login-output').innerText = 'Enter your password'
		

		

		</script>";
	}

	elseif ($cpassword=='') {
		echo "<script>

		document.querySelector('.login-output').innerText = 'Enter your confirm password'
		

		

		</script>";
	}

	elseif ($password!=$cpassword) {
		echo "<script>

		document.querySelector('.login-output').innerText = 'incorrect confirm password'
		

		

		</script>";
	}

	else{
		$connection= mysqli_connect('localhost', 'root', '', 'akash');
		$query="insert into users values('', '$name', '$email', '$country', '$password')";
		$cfc=mysqli_query($connection, $query);
		if ($cfc){
			header('location:loginn.php');
		}
		else{
			echo mysqli_error($connection);
		}
	}


}
?>






</html>