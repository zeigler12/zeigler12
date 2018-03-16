    <!-- Navigation -->

	<!--? ?-->
<!--CANT GET SEARCHBAR TO SQUARE UP IN CSS as well as WHEN THE SCREEN SHRINK WHY MY BUTTONS
(CART,SEARCH)DONT WORK-->


<style type= "text/css">
body{
        font-family: Arail, sans-serif;
    }
.search-box{
    font-size: 14px;
}
.search-box input[type="text"]{
     height: 32px;
     padding: 5px 10px;
     border: 1px solid #CCCCCC;
     font-size: 14px;
}
.result{
     position: absolute;
}
.search-box input[type="text"], .result{
     width: 100%;
     box-sizing: border-box;
}
/* Formatting result items */
.result p{
     margin: 0;
     padding: 7px 10px;
     border: 1px solid #CCCCCC;
     border-top: none;
     cursor: pointer;
}
.result p:hover{
    background: #f2f2f2;
}

</style>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
	    <!-- <a class="navbar-brand" href="#">Start Bootstrap</a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive ">
			<ul class="navbar-nav ml-auto">
				<li class = "nav-item">
				<?php
						$database = new DB();
						$query = "select * FROM product where pro_ID =".$_GET['add'].";"
				?>
					<a href = "cart.php" class = "nav-link cart-counter" id = "cart-info" title = "View Cart" onclick= "show_cart();">
						<i class="fa fa-shopping-cart fa-2x" aria-hidden="true">
							<span class = "cart-item" id = "cart-container" >
							<?php
							if(isset($_SESSION['cart_qty'])){
								echo $_SESSION['cart_qty'];
							}else{
								echo 0;
							}
							?>
							</span>
						</i>
					</a>
				</li>
				<div id="cart-info">
				</div>
				<li class="nav-item active">
					<a class="nav-link" href="http://isat-cit.marshall.edu/cit410/zeigler12/index.php">Home
					<span class="sr-only">(current)</span>
					</a>
				</li>
				<li class="nav-item">
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Contact</a>
				</li>
		   </ul>


		  <div class="container">
			<div class="form-group">
				<div class="search-box">
					<input type="text" autocomplete="on" placeholder="Search products..." />
						<div class="result" style="background-color:#fff"></div>
				</div>
			</div>


			<div id = "result"></div>
			</div>
        </div>
      </div>
    </nav>
