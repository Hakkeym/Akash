<?php


if (isset($_POST['submit'])) {
	$folder= "uploads/";
	$imageName= $_FILES['image']['name'];
	$imageSize= $_FILES['image']['size'];
	$imageTmp= $_FILES['image']['tmp_name'];
	$imageExt= pathinfo($imageName, PATHINFO_EXTENSION);
	$imagePath= $folder.$imageName;

	$price = $_POST['price'];
	$product_name=  $_POST['product_name'];

	$extension= array('jpg', 'jpeg', 'png', 'avi', 'gif');





	if (!in_array($imageExt, $extension)) {
		echo "only jpg, jpeg, png, avi, gif files are allowed";
	}

	elseif ($price=='') {
		echo "please enter the price of your product";
}
	elseif ($imageName=='') {
		echo "please select your image";
	}

	
	else{
		$upload= move_uploaded_file($imageTmp, $imagePath);
		if ($upload) {
			echo "upload successful";
			echo "<img src='{$imagePath}'>";
	$conn= mysqli_connect('localhost', 'root', '', 'akash payment');
	$query= "insert into pay values('', '$price', '$product_name', '$imagePath')";
	$dbc= mysqli_query($conn, $query);
	if($dbc){
		echo "yeah";
	}
	else{
		echo mysqli_error($connection);
	}
}


		else{
			echo "upload unsuccesful";
		}


}  //else
	







	}
	




?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>

	
		<h1>upload image</h1>
		<form method="post" action="" enctype="multipart/form-data">
			select image
			<input type="file" name="image">

		<input type="text" name="price" placeholder="enter your price">
		<input type="text" name="product_name" placeholder="enter your product name">
		<input type="submit" name="submit">
	</form>

























</body>
</html>