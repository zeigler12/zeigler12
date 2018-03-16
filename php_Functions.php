<?php
require_once('config/config.php');

//PRO_FEATURE ON INDEX PAGE
function pro_Feat(){
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
									<button type = 'button submit' class = 'btn btn-lg btn-info btn-primary' id = '$product[pro_ID]' onclick='sendProductId($product[pro_ID])'>Add to Cart</button>
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

	}
}










//GET PRODUCT DETAILS FOR DETAIL PAGE 
function get_Details(){
	$database = new DB();
	$query = "SELECT product.pro_ID, product.pro_Name, product.pro_Descript, product.pro_Price, 
	product.pro_Qty, product.pro_Manufacturer, product.pro_Model, product.cat_ID, product.pro_Feat, 
	product.pro_Weight
	FROM product WHERE product.pro_ID=".$_GET[pro_ID].";	";
	
	// get the data from the database class and store as an array, $rows
	$rows = $database->get_results($query);
	
	list($catname, $catid, $catsubcat) = $database->get_row($query);
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
}











//GET SUB_CAT PRODUCTS FOR PRODUCTS PAGE                          
function pro_SubCat(){
	$database = new DB();
	$query2 = "select * from product WHERE cat_ID=".$_GET['cat_ID']."";
	// get the data from the database class and store as an array, $rows
	$row = $database->get_results($query2);
	
	
	
	// draw our table header info
	echo "<br/><br/><table id='products' class='display'>
			<tbody>";
	
	// loop for each customer, output each customer to a new row in the table
	$count = 0; 

	foreach ($row as $product)
	{
		echo "	<div class='col-lg-4 col-md-6 mb-4'>
							<div class='card h-100'>
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
						</div>"; 
		
		
	?>
</div>
	</div>
<?		
	 "</td></tr>";
	
	}	
	// close up our table
	echo "</tbody></table>";
?>
</div>
</div>	
<?	
}







									//THE WIDTH FOR ALL PRODUCTS HAS CHANGED COMPARED TO SUB_CATS PODUCTS
//GET ALL PRODUCTS FOR PRODUCT PAGE
function all_Pro(){
	echo "<div class='container'>

      <div class='row'>

        

        	
		
	 <div class='col-lg-9'>
	  </br></br>
	   </br></br>
	 <div class='row'>";


    //Initiate the class
    $database = new DB();
 
    // output all customers with their names and emails to a table
	
	// query to get all customers
	$query = "select * from product";
	$rows = $database->get_results($query);
	
	
	// draw our table header info
	echo "<br/><br/><table id='products' class='display'>
			<tbody>";
	
	// loop for each customer, output each customer to a new row in the table
	$count = 0; 

	foreach ($rows as $product)
	{
		echo "<div class='col-lg-4 col-md-6 mb-4'>
							<div class='card h-100'>
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
							
				</div>"; 
	}
	"</td></tr>";
	echo "</tbody></table>";
}
	
function search_Bar(){
	?>
	<div class="container">
			<div class="form-group">
	<div class="search-box">
		<input type="text" autocomplete="on" placeholder="Search products..." />
		<div class="result" style="background-color:#fff"></div>
	</div>
	</div>


			<div id = "result"></div>
			</div>
	<?
	//require_once('config/config.php');
	echo $_GET['term'];
	if(isset($_GET['term'])){
		// Prepare a select statement
		$database = new DB();
		$sql = "SELECT * FROM product WHERE pro_Name LIKE '%".$_GET['term']. "%' limit 5";//'%$Name%'
		$row = $database->get_results($sql);
		if(count($row) >  0){
		  foreach ($row as $rows)
		  {
			echo "<p id='".$rows["pro_ID"]. "'>" . $rows["pro_Name"] . "</p>";
		  }
		}else{
			echo "<p>No matches found</p>";
		}
	}
	
}	
	
	
	
	?>









