<?php 

echo "<nav class='navbar navbar-expand-lg navbar-light bg-light'>
<a class='navbar-brand' href='#'></a>";
   
        
     "<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavA1tMarkup' aia-controls='navbarNavA1tMarkup'aria-expanded='false' aria-label='toggle navigation'>
          <span class=navbar-toggler-icon'></span>
        </button>";
     "<div class='collapse navbar-collapse' id='navbarNavA1tMarkup'>
    	<div class='navbar-nav'>
          <a class='nav-item nav-link active' href='mainpage.php'>Home <span class='sr-only'>(current)</span></a>
          <a class='nav-item nav-link '' href='itemz.php'>
          	Shopping cart(
          		
          		if (isset($_SESSION['items'])){
          			echo $_SESSION['items'];
          		}
          		


          	</a>
          	<a class='nav-item nav-link' href='#'>Total price

          		 
          			if (isset($_SESSION['total'])){
          				echo '#'. $_SESSION['total'];
          			
          			}
          			</a>
  <a class='nav-item nav-link' href='initialize.php?p=<?=$total?>'>check out</a>

          	
          </div>
      </div>

  </div>
</nav>";





 ?>