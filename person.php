	<style>
		img {width: 46px; }
	</style>
	
	<?

	// includes our site configuration file
	require_once("config/config.php");
	
    //Initiate the class
    $database = new DB();
	
	// query to get the particular customer
	// based on the querystring
	$query = "select * from category where cat_ID=" . $_GET['cat_ID'];
	
	// get the data from the database class and store as an array, $rows
	list($catname, $catid, $catsubcat) = $database->get_row($query);
	
	echo (file_exists("products/" . $_GET[id] . ".jpg")
			? "<img src='products/" . $_GET[id] . ".jpg'"
			: "<img src='products/unavailable.jpg'")
			. " />" . $catid . ", " . $catname . "<br />" . $catsubcat
			. "<hr />";
			
	// show all photos for a "person" if multiples exist, ie, create
	// a slideshow for this "person"
	
	// glob here searches for all files within the image folder that start
	// with the id of the "person" we are looking at, followed by an _
	// and then any other characters (* is wildcard), and returns a list
	// of matching files into the array $photos
	$photos = glob("products/" . $_GET[id] . "_*");
	
	// loop through photos array and output each img
	foreach ($photos as $key=>$value)
		echo "<img src='" . $value . "' />";
?>