<?php

require_once('config/config.php');

$data = $_POST;

$data = (array) $data; // cast (convert) the object to an array
$prod_id = $data["Prod_Id"];
$type = $data["type"]; //type 1 = add, 2 = update, 3 = delete

$database = new DB();
$cart_qty = 1;

if($type == 1)
{
  session_start();
  if($_SESSION['cart_ID'] != -1 && $_SESSION['cart_ID'] != ""){
    $queryid = "SELECT cart_qty FROM cart where cart_ID =".$_SESSION['cart_ID']. " and pro_ID = ".$prod_id;
    $row_id = $database->get_results($queryid);
    if(count($row_id) >  0){
      $cart_qty = $row_id[0]["cart_qty"] + 1;
      $query = "update cart set cart_qty= " .$cart_qty . " where cart_ID =".$_SESSION['cart_ID'];
    }
    else{
      $query = "insert into cart (cart_ID, pro_ID, cart_qty) VALUES (".$_SESSION['cart_ID']. "," .$prod_id.",1)";
    }
  }
  else{
    $queryid = "SELECT cart_ID FROM cart order by cart_ID desc limit 1";
    $row_id = $database->get_results($queryid);
    $cart_ID = $row_id[0]["cart_ID"] + 1;
    session_start();
    $_SESSION['cart_ID'] = $cart_ID;
    $query = "insert into cart (cart_ID, pro_ID, cart_qty) VALUES (".$cart_ID. "," .$prod_id.",1)";
  }

  $_SESSION['cart_qty'] = $_SESSION['cart_qty'] +1;
}else if($type == 2){
    session_start();
    $Quantity = $data["Quantity"];
    $queryid = "SELECT cart_qty FROM cart where cart_ID =".$_SESSION['cart_ID']. " and pro_ID = ".$prod_id;
    $row_id = $database->get_results($queryid);
    if(count($row_id) >  0){
      $cart_qty = $row_id[0]["cart_qty"];
      $_SESSION['cart_qty'] =  $_SESSION['cart_qty'] + ($Quantity - $cart_qty);
      $query = "update cart set cart_qty= " .$Quantity . " where cart_ID =".$_SESSION['cart_ID']. " and pro_ID = ".$prod_id;
    }

}
else if($type == 3){
  session_start();
  $queryid = "SELECT cart_qty FROM cart where cart_ID =".$_SESSION['cart_ID']." and pro_ID = ".$prod_id;
  $row_id = $database->get_results($queryid);
  if(count($row_id) >  0){
    $cart_qty = $row_id[0]["cart_qty"];
    $_SESSION['cart_qty'] = $_SESSION['cart_qty'] - $cart_qty;
    $query = "DELETE FROM cart where cart_ID =".$_SESSION['cart_ID']." and pro_ID = ".$prod_id;
  }

}
$row = $database->query($query);
echo $_SESSION['cart_qty'];
?>
