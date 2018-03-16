
		
<?php
require_once('config/config.php');
require_once('header.php');
?>
<style>
.navbar-nav{
	float: right;
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
		<?php
		
					   $database = new DB();
					$query = "select * from product where cat_ID =" . $_GET[id];
					$rows = $database->get_results($query);

	foreach ($rows as $product)
{
       echo" <div class='col-lg-9'>

          <div class='card mt-4'>
            <img class='card-img-top img-fluid' src='products/" . $_GET[id] . ".jpg'> 
			<h5>$$product[pro_Price]</h5>
			<p class='card-text'>$product[pro_Descript]</p>
          </div>";
}
?>
 <!-- /.card -->
          <div class="card card-outline-secondary my-4">
            <div class="card-header">
              Product Reviews
            </div>
            <div class="card-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
              <small class="text-muted">Posted by Anonymous on 3/1/17</small>
              <hr>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
              <small class="text-muted">Posted by Anonymous on 3/1/17</small>
              <hr>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
              <small class="text-muted">Posted by Anonymous on 3/1/17</small>
              <hr>
              <a href="#" class="btn btn-success">Leave a Review</a>
            </div>
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->
		</div>
      </div>
</div>
    </div>
    <!-- /.container -->

    <!-- Footer -->
        <?php require_once('footer.php');?>
	<!-- Footer -->


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>


</body>