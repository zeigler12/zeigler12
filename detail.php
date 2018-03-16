<?php
require_once('config/config.php');
require_once('header.php');
require_once('php_Functions.php');
?>

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
		
	<div class="col-lg-9">
	<div class="card mt-4">
	<?php
	get_Details();
	?>
</div>
</div>


        </div>
        <!-- /.col-lg-9 -->

      </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php require_once('footer.php');?>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>


