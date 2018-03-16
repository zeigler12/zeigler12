<?php
require_once('config/config.php');
require_once('header.php');

?>
<script>
 $(document).ready(function(){
	 var totalCalc = 0;
	 totalCalcArray = [];
	$('td.price').each(function(value){
		
		var total = {totalValue:$('#' + $(this).attr('id')).text().substr(1) * $('#input-' + $(this).attr('id')).val(), totalID:$('#totalID-' + $(this).attr('id')).val()};//this multi them together
		$('#totalID-' + $(this).attr('id')).text(total.totalValue); //displays total
		var calcInt = parseInt(total.totalValue);
		totalCalc += calcInt;
		totalCalcArray = totalCalc.toString(); 
		//var fruit = totalCalcArray[1];
		//var totalCalcString = totalCalc.toString();
		//alert(totalCalcArray);
		
		$('td#price_total').text(totalCalc);
		
		
		
		//alert(Object.values(total));
		//total.totalID;
		//$('#price_total').text('hello');
		//alert(total.totalID);
		
		//totalArray = total;
		//$('#totalID-' + $(this).attr('id')).val();
			//alert('totalID-' + $(this).attr('id'));
			//alert(totalArray);
			//$('totalID-' + $(this).attr('id')).text(total)
		//$('#totalID').html(totalArray);
		//$(this).text(totalArray);
		//});
		//alert(total);
  //var price = [$('#\\<?$rows[pro_Price]?>').text()];
  //var qty = $('#number').val();
  //var total = price * qty;
  //alert($(this).text());
  //var values = [];
  //$(totalID).text(total);
  //alert(qty);
    });
	//$('td > input').each(function(){
	 // values.push($(this).val());
	//  alert($(this).val());
  //});
}); 
</script>
<!--"SELECT * FROM order where cus_ID =" . $_GET[id];-->

<!--"SELECT * FROM order;-->
<!--"SELECT * FROM order where cus_ID =" . $_GET[id];-->
<!-- Navigation -->
    <?php
	require_once('topNavBar.php');
	?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- <div class="col-lg-3">
			<?php
				//require_once('sideMenu.php');
			?>
         </div> -->



	<table id="cart" class="table table-hover table-condensed">

						<?php
            session_start();
            $cart_ID = $_SESSION['cart_ID'];
						$database = new DB();
						//$query = "select * FROM product where pro_ID =".$cart_ID."";
            $query = "Select * From product as p inner join cart  as c on p.pro_ID = c.pro_ID where c.cart_ID =".$cart_ID;

            //echo $query; return;
						$row = $database->get_results($query);
            $price_total = 0;
            $price_Column_Total = 0;
			
            echo "<thead>
                <tr>
                  <th style = 'width: 50%'>Product</th>
                  <th style='width:50%'>Product Price</th>
                  <th style='width:10%'>Quantity</th>
                  <th style='width:8%'>Item Total</th>
                  <th style='width:22%' class='text-center'>Delete</th>
                  <th style='width:22%' class='text-center'>Update</th>
                  <th style='width:10%'></th>
                </tr>
              </thead>";
						foreach ($row as $rows)
						{
             // $price_Column_Total =  $rows[pro_Price] * $rows[cart_qty];//+= $rows[pro_Price];
             // $price_total += $price_Column_Total;
							echo "
								<tbody>
									<tr>
										<td data-th=$rows[pro_Name]>
											<div class='row'>
												<div class='col-sm-2 hidden-xs'><img class = 'card-img-top img-responsive' src = 'products/" . $rows[pro_ID] . ".jpg'></div>
												<div class='col-sm-10'>
													<h4 class='nomargin'>$rows[pro_Name]</h4>
													<p>$rows[pro_Descript]</p>
												</div>
											</div>
										</td>
										<td data-th='Price' id = '$rows[pro_ID]' class = 'Price'>$$rows[pro_Price]</td>
										<td data-th='Quantity'>
											<input type='number' id = 'input-$rows[pro_ID]'  class='form-control text-center' value='$rows[cart_qty]'>
										</td>
										<td data-th='Subtotal' id = 'totalID-$rows[pro_ID]' class='text-center'>$</td>
										<td class='actions  align='center' data-th=''>
											<a href= '#' class='btn btn-danger centerTrash remove-item btn-sm' data-code='$rows[pro_ID]' onclick='deleteProduct($rows[pro_ID])'><i class='fa fa-trash-o'></i></a>
                    </td>
                    <td class='actions' data-th=''>
                      <a href= '#' class='btn btn-primary btn-sm' data-code='$rows[pro_ID]' onclick='updatePro($rows[pro_ID])'><i class='fa'></i>Update</a>
                    </td>
									</tr>
								</tbody>";

						}
            echo "
            <tfoot>
              <tr class='visible-xs'>
                <td class='text-center' id = 'price_total'><strong>Total $</strong></td>
              </tr>
              <tr>
                <td><a href='javascript:window.history.back();' class='btn btn-warning'><i class='fa fa-angle-left'></i> Continue Shopping</a></td>
                <td colspan='2' class='hidden-xs'></td>
                <td class='hidden-xs text-center' id = 'price_total'><strong>Total $</strong></td>
                <td><a href='#' class='btn btn-success btn-block'>Checkout <i class='fa fa-angle-right'></i></a></td>
              </tr>
            </tfoot>"
						?>
	</table>
</div>
</div>



 <?php require_once('footer.php');?>
