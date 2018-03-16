<?php
require_once('config/config.php');
require_once('header.php');
?>
<!--? ?-->
<!--WHY IS CARD BODY ELONGATED-->
<style>
.navbar-nav{
	float: right;
}
.carouselImage{
	width:900px;
	height:200x;
}

</style>

  <body>

    <!-- Navigation -->
    <?php
	require_once('topNavBar.php');
	?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">
			<?php
				require_once('sideMenu.php');
			?>
        </div>

        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div id="carouselExampleIndicators" class="carousel slide my-4">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid carouselImage" src="toolImages/makita.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid carouselImage" src="toolImages/bosch.jpg" alt="Second slide">
              </div>
			  <div class="carousel-item">
                <img class="d-block img-fluid carouselImage" src="toolImages/dewalt.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid carouselImage"  src="toolImages/irwin.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>


		<div class='row'>

		  <?php
		      $database = new DB();
	$query = "select * from product where pro_Feat = 'y' ";
	$query2 = "select cat_ID from category";
	$rows = $database->get_results($query);
	$rows2 = $database->get_results($query2);

foreach ($rows as $product)
	{


				echo "<div class='col-lg-4 col-md-6'>
							<div class='card' style='height: 100%; max-height: 550px;'>
								<a href='detail.php?pro_ID=$product[pro_ID]'><img class = 'card-img-top' src = 'products/" . $product[pro_ID] . ".jpg'></a>
								<div class='card-body'>
									<h4 class='card-title'><a href='detail.php?pro_ID=$product[pro_ID]'>$product[pro_Name]</a></h4>
									<h5>$product[pro_Price]</h5>
									<p class='card-text'>$product[pro_Descript]</p>
								</div>
								<div class='card-footer'>
									<input name='product_code' type='hidden' value='$product[pro_ID]'>
									<button type = 'button' class = 'btn btn-lg btn-info btn-primary' id = $product[pro_ID] onclick='sendProductId($product[pro_ID])'>Add to Cart</button>
									<button type = 'button' class = 'btn btn-lg btn-info btn-primary' data-toggle='modal' data-target='#$product[pro_ID]1'>Quick View</button>
									<div id = 'addCart' class = 'container'>
										<div class = 'modal fade' id = '$product[pro_ID]1' role= 'dialog'>
											<div class = 'modal-dialog'>
												<div class = 'modal-content'>
													<div class = 'modal-header'>
														<button type = 'button' class = 'close' data-dismiss= 'modal'>&times;</button>
													</div>
													<div class = 'modal-body'>
														<img class = 'card-img-top' src = 'products/" . $product[pro_ID] . ".jpg'>
														<h3>$product[pro_Name]</h3>
														<h5>$product[pro_Price]</h5>
														<p class='card-text'>$product[pro_Descript]</p>
														<button type = 'button' class = 'btn btn-default' data-dismiss= 'modal'>Close</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>



					";


















			/*








			echo "	<div class='col-lg-4 col-md-6 mb-4'>

						<div class='card'>
							<a href='detail.php?pro_ID=$product[pro_ID]'><img class = 'card-img-top' src = 'products/" . $product[pro_ID] . ".jpg'></a>
							<div class='card-body'>
								<h4 class='card-title'><a href='detail.php?pro_ID=$product[pro_ID]'>$product[pro_Name]</a></h4>
								<h5>$product[pro_Price]</h5>
								<p class='card-text'>$product[pro_Descript]</p>
							</div>
							<div class='card-footer'>
								<input name='product_code' type='hidden' value='$product[pro_ID]'>
								<button type = 'button' class = 'btn btn-lg btn-info btn-primary' id = $product[pro_ID] onclick='sendProductId($product[pro_ID])'>Add to Cart</button>
								<button type = 'button' class = 'btn btn-lg btn-info btn-primary' data-toggle='modal' data-target='#$product[pro_ID]'>Quick View</button>
							</div>
								 </div>
							</div>

					";






			<div id = 'addCart' class = 'container'>
									<div class = 'modal fade' id = '$product[pro_ID]' role= 'dialog'>
										<div class = 'modal-dialog'>
											<div class = 'modal-content'>
												<div class = 'modal-header'>
													<button type = 'button' class = 'close' data-dismiss= 'modal'>&times;</button>
												</div>
												<div class = 'modal-body'>
													<img class = 'card-img-top' src = 'products/" . $product[pro_ID] . ".jpg'>
													<h3>$product[pro_Name]</h3>
													<h5>$product[pro_Price]</h5>
													<p class='card-text'>$product[pro_Descript]</p>
													<button type = 'button' class = 'btn btn-default' data-dismiss= 'modal'>Close</button>
												</div>
											</div>
										</div>
									</div>
								</div>

















			 <div class='card-body'>
                  <h4 class='card-title'>
				  <a href='items.php?id=$product[cat_ID]'>$product[pro_Name]</a>
                  </h4>
				  <h5>$product[pro_Price]</h5>
                  <p class='card-text'>$product[pro_Descript]</p>
                </div>
                <div class='card-footer'>
                  <small class='text-muted'>&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>










			(file_exists("products/" . $product[pro_ID] . ".jpg")
			? "<img src='products/" . $product[pro_ID] . ".jpg'"
			: "<img src='products/unavailable.jpg'")
			. "/></td><td><a href='person.php?id="
			. $product[pro_ID] . "'>" . $product[cus_LastName] . " "
			. $product[pro_Name] . "</a></td><td>"
			. $product[pro_Qty] . "</a></td><td>"
			. $product[pro_Manufacturer] . "</a></td><td>"
			. $product[pro_Price] . "</td>"
			. "<td><button class = 'addCart'>Add to Cart</button></td>"
			. "<td>" */




	}
	//mysqli_close($conn);

		  ?>


		</div>
</div>


        </div>
		</div>
        <!-- /.col-lg-9 -->


      <!-- /.row -->


    <!-- /.container -->

    <!-- Footer -->
    <?php require_once('footer.php');?>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
<script>


</script>
