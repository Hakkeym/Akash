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
          <a class="nav-item nav-link active" href="order02.php">Previous page <span class="sr-only">(current)</span></a>
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
<center style="font-size: 40px;">Akash Fashion World</center>
</header>
<div class="container">

<h3>Shopping cart</h3>


<?php



if (isset($_SESSION['cart'])) {
  $count = 1;

  if (!empty($_SESSION['cart'])) {
      echo '<table class="table table-hover table-striped mt-5">';

        echo '<thead>
            <th>S/N</th>
            <th>Product_name</th>
            <th>Price per unit</th>
            <th>Quantity</th>
            <th>Total price</th>
            <th>Actions</th>
        </thead>';


        foreach ($_SESSION['cart'] as $item) {
         
         
          echo "<tr>";
          echo "<td>".$count."</td>";
          echo "<td>".$item['product_name']."</td>";
          echo "<td>".$item['price']."</td>";
          echo "<td>".$item['qty']."</td>";
          echo "<td>".$item['totalPrice']."</td>";
          echo "<td>";
          echo "<a href='ecommerce.cart.php?id={$item['id']}&action=s' class='btn btn-secondary btn-sm mr-3'>Remove 1</a>";
          echo "<a href='ecommerce.cart.php?id={$item['id']}&action=a' class='btn btn-danger btn-sm'>Remove all</a>";
          
          echo "</td>";
          echo "</tr>";
          $count++;
        }
    
  }
  else{
    echo "<br><br><h4>No item in cart!</h4>";  
  }
 

}
else{
  echo "<br><br><h4>No item in cart!</h4>";
}

?>


 </table>
</div>
</body>
</html>