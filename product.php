<?php
require_once('config/config.php');
require_once('header.php');
require_once('php_Functions.php');
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
					//$database = new DB();

				if($_GET['cat_SubCat'])
				{
					pro_SubCat();	
				}else{
					all_Pro();
				}
				?>
		
			</div>
		</div>

						
		</div>
	</div>


<?php require_once('footer.php');?>





 

	




    

</body>










