<?php
require_once('config/config.php');
require_once('header.php');
?>
<style>
	.card-body{
	display: block;
}

</style>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<!--<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src ="https://cdn.datatables.net/plug-ins/1.10.13/filtering/row-based/range_numbers.js"></script>
	<script src="filtering/filtering.js"></script>
	<link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet" />-->
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

        	
		
	 <div class="col-lg-9">
	  </br></br>
	   </br></br>
	 <div class='row'>
	
<?
    $database = new DB();

if($_GET['cat_SubCat'])
{
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
<?php 

}else{
?>



<?php

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
		

	?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	</div>
		</div>

						
						 </div>
						<?$count++; ?>
<?		
	 "</td></tr>";
	
	}	
	// close up our table
	echo "</tbody></table>";	
}?>
</div>


<?php require_once('footer.php');?>





 

	




    

</body>










