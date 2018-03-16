<?php
if(isset($_POST["pro_ID"]))
{
    foreach($_POST as $key => $value){
        $new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); //create a new product array 
    }
    
    //we need to get product name and price from database.
    $database = new DB();
	$query = "select product.pro_ID, product.pro_Name, product.pro_Price FROM product where pro_ID =" .$_GET['pro_ID']." LIMIT 1";

    

    while($rows as $product){ 
        $new_product["product_name"] = $product[pro_Name]; //fetch product name from database
        $new_product["product_price"] = $product[pro_Price];  //fetch product price from database
        
        if(isset($_COOKIES["cart_ID"])){  //if session var already exist
            if(isset($_COOKIES["cart_ID"][$new_product['product_code']])) //check item exist in products array
            {
                unset($_COOKIES["cart_ID"][$new_product['product_code']]); //unset old item
            }           
        }
        
        $_COOKIES["cart_ID"][$new_product['pro_id']] = $new_product; //update products with new item array   
    }
    
    $total_items = count($_COOKIES["cart_ID"]); //count total items
    die(json_encode(array('items'=>$total_items))); //output json 

}

?>