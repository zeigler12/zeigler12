<?php
/* require_once('config/config.php');
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
} */

?>
