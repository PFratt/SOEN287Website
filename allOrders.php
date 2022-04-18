 <?php include "head.inc.php" ?>

<body class="backstore">

 <?php include "header.html" ?>
<?php include orderList.php ?>
 <div class="container">
	<script>
	function contentGenerate(){
		var tempOrders = document.getElementById("selectOrder").options[document.getElementById("selectOrder").selectedIndex].text;
		var element = null;
		for(var i = 0; i < orderArray.length; i++){
			if(tempOrders == orderArray[i].email){
				element = orderArray[i];
			}
		}
		if(element == null){
			document.getElementById("table1").innerHTML = "";
		}
		else {
			document.getElementById("table1").innerHTML = '<tr>' +
			'<th colspan=0> Order Specifics </th> <td> <input type="submit" name="update" value="Edit"></input> <input type="submit" name="delete" value="Delete"></input> </td>' +
			'</tr>' +
			'<tr>' +
			'<th> Products and quantities <input type="text" name="product_quantities" value="' + element.product_quantities + '"></th>' +
			'<th> Final price of order <input type="text" name="final_price" value="' + element.final_price  + '"></th>' +
			'<th> Order ID <input type="text" name="ID" readonly value="' + element.id + '"></th>' +
			'</tr>';
		}
	}

	</script>

 	 Product List :
 				<select id="selectOrder">
 					<option value="">--- Select ---</option>
 				</select>
 					<button class="selectorButton" type="submit" name="Submit" value="Select" onclick="contentGenerate();"> Select </button>

					<script>

				 	 var orderArray = getOrders();
				 		var selectOrderID = document.getElementById("selectOrder");
				 		var string = '<option value="">--- Select ---</option>';
				 		for(var i = 0; i < orderArray.length; i++){
				 			string = string.concat('<option name="'+ orderArray[i].id + '" value=""> ' + orderArray[i].id + '</option>');
				 		}
				 		document.getElementById("selectOrder").innerHTML = string;

				  </script>

<form method="POST" action="deleteOrder.php"><table id="table1"></table></form>
<form method="POST" action="addOrder.php">
<table align='center' cellspacing=2 cellpadding=5 id="data_table" border=0>
<tr>
<th colspan=0>Add New Order</th> <td> <input class="selectorButton" type="submit" name="checkout" value="Add"></td>
</tr>
<tr>
<th> Product Quantities <input type="text" name="product_quantities"></th>
<th> Final Price <input type="text" name="final_price"></th>
</tr>
</form>

</table>

</div>

</body>

<?php include "footer.html" ?>

</html>
