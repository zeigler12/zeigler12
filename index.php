<?php
require_once('config/config.php');
require_once('header.php');
require_once('php_Functions.php');
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
		  pro_Feat();
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
