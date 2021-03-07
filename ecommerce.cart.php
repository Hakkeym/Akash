<?php

session_start();
	

	if (isset($_POST['submit'])) {

		$id=$_POST['id'];
		$qty=$_POST['qty'];
		
			//get info of the product from db using the id and store in cart

			$con= mysqli_connect('localhost','root','','akash payment');

			$sql= "select * from pay where id= '$id' ";

			$dbc=mysqli_query($con,$sql);

			while ($row=mysqli_fetch_array($dbc)) {

				$id= $row['id'];
				$product_price=$row['price'];
				$product_name=$row['product_name'];
		
			}


		// if cart doesn't exist, create cart
		if (!isset($_SESSION['cart'])) {
			
			//create a new cart array in session
			$_SESSION['cart']=array();

			$_SESSION['items']=0;

			//store the info in cart

			//get total price of item
			$totalPrice= $product_price*$qty;
  			array_push($_SESSION['cart'],array(
  				'id'=>$id,
				'product_name'=>$product_name,
				'price'=>$product_price,
				'totalPrice'=>$totalPrice,
				'qty'=>$qty
			));

			$_SESSION['total']= $totalPrice;
			$_SESSION['items']=$_SESSION['items']+$qty;

				header('Location: order2.php');


		} 
		// add new item to existing cart
		else {

			//get total price of item
			$totalPrice= $product_price*$qty;
  			
			array_push($_SESSION['cart'],array(
				'id'=>$id,
				'product_name'=>$product_name,
				'price'=>$product_price,
				'totalPrice'=>$totalPrice,
				'qty'=>$qty
			));

			$_SESSION['total']= $_SESSION['total'] + $totalPrice;
			$_SESSION['items']= $_SESSION['items']+ $qty;

				header('Location: order2.php');
		}
		

	
	}



//..........................................................................................

// remove items from cart

if (isset($_GET['id'])) {
	$id=$_GET['id'];

	if ($_GET['action']=='s') {
		// remove one item from the product selected from cart



		foreach ($_SESSION['cart'] as $item=>$singleItem) {
        	
			if($singleItem['id']==$id){

				$_SESSION['total']=$_SESSION['total']-$singleItem['price'];
				
				$_SESSION['items']= $_SESSION['items']-1;

				
				
				$_SESSION['cart'][$item]['qty']=$_SESSION['cart'][$item]['qty']-1;
				$_SESSION['cart'][$item]['totalPrice']=$_SESSION['cart'][$item]['totalPrice']-$singleItem['price'];


				if ($_SESSION['cart'][$item]['qty']==0) {
					unset($_SESSION['cart'][$item]);
					header("Location:itemz.php");
				}

				header("Location:itemz.php");
			}
		}


	}
	else{

		// remove all items selected from cart

		// remove one item from the product selected from cart



		foreach ($_SESSION['cart'] as $item=>$singleItem) {
        	
			if($singleItem['id']==$id){

				$_SESSION['total']=$_SESSION['total']-$singleItem['totalPrice'];
				
				$_SESSION['items']= $_SESSION['items']-$singleItem['qty'];

				unset($_SESSION['cart'][$item]);

				header("Location:itemz.php");
			}
		}


	}

}














?>