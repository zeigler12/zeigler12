<?php
require_once('config/config.php');
require_once('header.php');
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
		<?php
		$database = new DB();
	
	// query to get the particular customer
	// based on the querystring
	//$query = "select cat_Name, cat_ID, cat_SubCat from category where cat_ID=" . $_GET[id];
	
	
	
	
	
	
	
	
	$query = "SELECT product.pro_ID, product.pro_Name, product.pro_Descript, product.pro_Price, 
product.pro_Qty, product.pro_Manufacturer, product.pro_Model, product.cat_ID, product.pro_Feat, 
product.pro_Weight
FROM product 

WHERE product.pro_ID=".$_GET[pro_ID].";
";
	
	// get the data from the database class and store as an array, $rows
	$rows = $database->get_results($query);
	
	list($catname, $catid, $catsubcat) = $database->get_row($query);
	?>
	<div class="col-lg-9">
	<div class="card mt-4">
	<?php
	echo (file_exists("products/" . $_GET[pro_ID] . ".jpg")
			? "<img class='card-img-top img-fluid' src='products/" . $_GET[pro_ID] . ".jpg'"
			: "<img class='card-img-top img-fluid' src='products/unavailable.jpg'");
			 
			foreach ($rows as $product)
			{
				echo "<div class='card-body'>
							<h3 class='card-title'>". $product[pro_Name]."</h3>
								<h4>".$product[pro_Price]."</h4>
									<p class='card-text'>".$product[pro_Descript]."</p>
										<p>" .$review[rev_Detail]. "</p>
										<div id = 'spanRight'><a href = 'http://isat-cit.marshall.edu/cit410/zeigler12/cart.php?add=$product[pro_ID]' class='btn btn-lg btn-info btn-primary'>Add to Cart</a></div>
		            </div>";
					$database = new DB();
					$query2 = "SELECT review.rev_ID, review.rev_Score, review.rev_Detail,
								review.pro_ID, review.cus_ID, customer.cus_ID, customer.cus_FirstName,
								customer.cus_LastName, customer.cus_Email
								FROM review
								INNER JOIN customer ON review.cus_ID=customer.cus_ID
								WHERE review.pro_ID=".$product[pro_ID].";";
					$row2 = $database->get_results($query2);
					
						echo "<div class='card card-outline-secondary my-4'>
								<div class='card-header'>
								  Product Reviews
								</div>";
								foreach ($row2 as $review)
					{
							echo	"<div class='card-body'>
								<p>".$review[rev_Detail]."</p>
								Posted by
								<small class='text-muted'>".$review[cus_FirstName]."</small>
								 on 3/1/17
								<hr>
								  <a href='#' class='btn btn-success'>Leave a Review</a>
								</div>";
					}
			}
			?>
			
			<?
					/* $database = new DB();
					$query2 = "SELECT * FROM review WHERE review.pro_ID=".$GET_[pro_ID].";";
					print_r($query2);
					$row2 = $database->get_results($query2); */
					
					/* foreach ($row2 as $review)
					{
						echo "<div class='card card-outline-secondary my-4'>
								<div class='card-header'>
								  Product Reviews
								</div>
								<div class='card-body'>
								<p>".$review[rev_Detail]."</p>
								<small class='text-muted'>*******SQL CUSTOMER JOIN WITH REVIEWE Posted by Anonymous on 3/1/17******</small>
								<hr>
								  <a href='#' class='btn btn-success'>Leave a Review</a>
								</div>";
					} */
			

?>	
</div>
</div>
<!--
<div class="card-body">
<h3 class="card-title"><//?$_GET['cat_Name']?></h3>
<h4$>?></h4>
<p class="card-text">detail description of produc</p>
<span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
              4.0 stars
</div>
</div>
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



 /.card 
 <div class="card-body">
          <div class="card mt-4">
            <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">
            <div class="card-body">
              <h3 class="card-title">Product Name</h3>
              <h4>$24.99</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente dicta fugit fugiat hic aliquam itaque facere, soluta. Totam id dolores, sint aperiam sequi pariatur praesentium animi perspiciatis molestias iure, ducimus!</p>
              <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
              4.0 stars
            </div>
          </div>
          

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
    <!-- /.container -->

    <!-- Footer -->
    <?php require_once('footer.php');?>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>


