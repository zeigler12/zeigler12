
<style>
 .sideBar{
	 float: left; 
 }
 ul {
  list-style-type: none;
}
#accordion {
	list-style: none;
	padding: 0 0 0 0;
	width: 170px;
}
#accordion div {
	display: block;
	background-color: #ffffff;
	font-weight: bold;
	margin: 12px;
	cursor: pointer;
	padding: 5 5 5 7px;
	list-style: circle;
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	border-radius: 10px;
}
#accordion ul {
	list-style: none;
	padding: 0 0 0 0;
}
#accordion ul{
	display: none;
}
#accordion ul li {
	font-weight: normal;
	cursor: auto;
	background-color: #fff;
	padding: 0 0 0 7px;
}
#accordion a {
	text-decoration: none;
}
#accordion a:hover {
	text-decoration: underline;
}
</style>
		  
	<a href="http://isat-cit.marshall.edu/cit410/zeigler12/index.php">
		<img src="toolTime.png" style="width:150px;height:150px;border:0">
	</a>
		  
 <div class = "navbar-default sidebar" role= "navigation">
 <div class="sidebar-nav navbar-collapse">
 <div id = "accordion">
<h3><a href = "product.php" class='list-group-item'>All Products</a></h3>
 <?php
$database = new DB();
$query = "select * from category where cat_SubCat IS NULL";
$rows = $database->get_results($query);
foreach ($rows as $row)
{
//this should be a drop down
echo "<h3><a href='#' class='list-group-item cat' id='c$row[cat_ID]'>" . $row[cat_Name] . "</a></h3>";
		
		$query2 = "select * from category where cat_SubCat=" .$row[cat_ID]."";
		$subs = $database->get_results($query2);
		echo "<div class='subcat' id='s$row[cat_ID]'>";
		foreach ($subs as $sub)
		{
		echo	"<div><p><a href='product.php?cat_ID=".$sub[cat_ID]."&cat_SubCat=".$sub[cat_SubCat]."' class='list-group-item'>" . $sub[cat_Name] . "</a></p></div>";
		}
		echo "</div>";
}

?>
<!--this should be a drop down-->
</div>
</div> 
 
</div>
 
 
<script>
	$(document).ready(function() {
		$('.subcat').hide();
		$('.cat').click(function() {
			$('.subcat').hide('slow');
			$id = $(this).attr('id');
			$("#s" + $id.substring(1)).show('slow');
		});
	});
</script>

 

 
 
 
 

				