	//Add items to cart
	$(".products").submit(function(e){
		var table_data = $(this).serialize();
		var button_content = $(this).find('button[type=submit]');
		button_content.html('Adding...');
		$.ajax({
			url: "manage_cart.php",
			type: "POST",
			dataType:"json",
			data: table_data
		}).done(function(data){
			$("#cart-container").html(data.products);
			button_content.html('Add to Cart');
		})
		e.preventDefault();
	});

//type 1 = add, 2 = update, 3 = delete
function sendProductId(id){

	 var json_data = {
		Prod_Id : id,
		type: 1
	}

	$.ajax({
		url: "manage_cart.php",
		type: "POST",
		dataType:"json",
		data: json_data
	}).done(function(data){
		$("#cart-container").html(data);
	});
}

function updatePro(id){
	var json_data = {
	 Prod_Id : id,
	 type: 2,
	 Quantity: $("#input-"+id).val()
 }
 $.ajax({
	 url: "manage_cart.php",
	 type: "POST",
	 dataType:"json",
	 data: json_data
 }).done(function(data){
	 $("#cart-container").html(data);
 });
}



function deleteProduct(id){
	$("#"+id).remove();

	var json_data = {
	 Prod_Id : id,
	 type: 3
 }

 $.ajax({
	 url: "manage_cart.php",
	 type: "POST",
	 dataType:"json",
	 data: json_data
 }).done(function(data){
	 $("#cart-container").html(data);
 });
}

	//Remove Items
