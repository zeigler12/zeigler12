<?php
session_start();
$_SESSION['USER'];

//check if the form has been submitted
if(!isset($_SESSION['cart_ID'])){
    $_SESSION['cart_ID'] = -1;
}

if(!isset($_SESSION['cart_qty'])){
    $_SESSION['cart_qty'] = 0;
}

session_id();
$cart_ID = session_id();

$cookie_name = "cart_ID";
$cookie_value = "$cart_ID";

setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

if(!isset/*(session_status() == PHP_SESSION_NONE) ||*/ ($_COOKIE[$cookie_name])) {
	$cart_ID = session_id();
	$cookie_name = "cart_ID";
	$cookie_value = $cart_ID;

	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
    echo "Cookie value '" . $cookie_value . "' is set!";

} else {
    echo "$//cookie_name '" . $cookie_value. "' is set!<br>";
    echo "$//cookie_Value is: " . $_COOKIE[$cookie_name];//or $cookie_value gets same
}

/* $database = new DB();
	$query = "select * from cart where pro_Feat = 'y' ";
	$query2 = "select cat_ID from category";
	$rows = $database->get_results($query);
	$rows2 = $database->get_results($query2);
foreach ($rows as $product)
	{
	} */
?>
<!--if ($_COOKIE[USER_ID])
{
	$USER_ID = $_COOKIE[USER_ID];
}
else
{
	$USER_ID = session_id();
	$cookie_name = "USER_ID";
	$cookie_value = $USER_ID;

	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
}

$cart_Products = array();
$cart_Session = array($cart_Products);


if(!isset/*(session_status() == PHP_SESSION_NONE) ||*/ ($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
} -->

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
 <!--jQuery code-->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">-->
    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
	<link href = "font-awesome-4.7.0/css/font-awesome.min.css " rel="stylesheet" type="text/css">
	<!--<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>-->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!--<script type="text/javascript" src="DataTables/datatables.min.js"></script>-->
	<!--<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>-->
   <!-- <script src ="https://cdn.datatables.net/plug-ins/1.10.13/filtering/row-based/range_numbers.js"></script>-->
	<!--<script src="filtering/filtering.js"></script>-->
	<!--<link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet" />-->
	<script src= "typeahead.min.js"></script>
	<script type="text/javascript">
  $(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("searchbar.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();

        window.location.href = "detail.php?pro_ID="+$(this).attr('id');
    });
});

  </script>
	<script src="js/cart.js"></script>
<style>
  .centerTrash{
  display: block;
  margin: auto;
  }
</style>
  </head>
