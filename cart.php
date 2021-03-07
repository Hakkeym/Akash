<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  <style type="text/css">
    
    
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
          <a class="nav-item nav-link active" href="order2.php">Baack <span class="sr-only">(current)</span></a>
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

<header class="jumbotron header" style=" color: black">
<center style="font-size: 40px;">Akash Fashion Line</center>
</header>
<div class="container">

<?php


if (isset($_GET['p'])) {

  $price= $_GET['p'];

  

if (!isset($_SESSION['total'])) {
  $_SESSION['total']=$price;
  $_SESSION['items']=1;
}

else{
  $_SESSION['total']=$_SESSION['total']+$price;
  $_SESSION['items']++;
}


  
  echo "<center>";

  if (isset($_GET['p'])) {

    $id= $_GET['p'];



      //get info of the product from db using the id and store in cart

      $connection= mysqli_connect('localhost','root','','akash payment');

      $query= "select * from pay where id= '$id' ";

      $result=mysqli_query($connection,$query);


     while ($row=mysqli_fetch_array($result)) {
        $image=$row['image_name'];
        $price=$row['price'];
        $product_name=$row['product_name'];


        echo "<p><b>Product Name: </b>".$row['product_name'].'</p><br>';
        echo "<img src='{$image}'  class='image' width='300' height='300'>"."<br></br>";
      
        echo "<b>Price$: {$row['price']}</b><br>";
        echo "<form method='post' action='ecommerce.cart.php'>";
        echo "Enter quantity<br>";
        echo "<input type='number' name='qty'><br><br>";
        echo "<input type='hidden' name='id' value='{$row['id']}'>";
         echo "<input type='submit' name= 'submit' value='Add to cart' class='btn btn-primary'>";
        echo "</form>";
       


      }
    }
      echo "</center>";

     
}

?>


</div>
</body>
</html>