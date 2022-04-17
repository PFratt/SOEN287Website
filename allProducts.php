<?php include "head.inc.php" ?>

<body class="backstore">

 <?php include "header.html" ?>

 <?php include "productList.php"?>
 <div class="container">
	<script>
	function contentGenerate(){
		var tempProduct = document.getElementById("selectProduct").options[document.getElementById("selectProduct").selectedIndex].text;
		var element = null;
		for(var i = 0; i < productArray.length; i++){
			if(tempProduct == productArray[i].name){
				element = productArray[i];
			}
		}
		if(element == null){
			document.getElementById("table1").innerHTML = "";
		}
		else {
			document.getElementById("table1").innerHTML = '<tr>' +
			'<th colspan=0> Product Specifics </th> <td> <input type="submit" name="update" value="Edit"></input> <input type="submit" name="delete" value="Delete"></input> </td>' +
			'</tr>' +
			'<tr>' +
			'<th> Name <input type="text" name="name" value="' + element.name + '"></th>' +
			'<th> Origin <input type="text" name="origin" value="' + element.origin + '"></th>' +
			'<th> Quantity <input type="text" name="quantity" value="' + element.quantity + '"></th>' +
			'<th> Discount Price <input type="text" name="discount" value="' + element.discount_price + '"></th>' +
			'<th> Price <input type="text" name="price" value="' + element.regular_price + '"></th>' +
			'<th> Description <input type="text" name="description" value="' + element.description + '"></th>' +
			'<th> Image <input type="text" name="image_ref" value="' + element.image_ref + '"></th>' +
			'<th> Aisle <select name="aisle" value="' + element.aisle + '"><option>Fruits & Vegetables</option><option>Dairy & Eggs</option><option>Meat & Poultry</option><option>Fish & Seafood</option></select></th>' +
			'<th> Quantity per unit <input type="text" name="numOfItems" value="' + element.numOfItems + '"></th>' +
			'<th> Popular <input type="checkbox" name="popular" value="' + element.popular + '"></input></th>' +
			'<th> <input readonly value="' + element.id + '" name="id"> product id </input><th>' +
			'</tr>';
		}
	}

	</script>

 	 <h1> Product List : </h1>
 				<select id="selectProduct">
 					<option value="">--- Select ---</option>
 				</select>
 					<button class="selectorButton" type="submit" name="Submit" value="Select" onclick="contentGenerate();"> Select </button>

					<script>

				 	 var productArray = getProducts();
				 		var selectProductID = document.getElementById("selectProduct");
				 		var string = '<option value="">--- Select ---</option>';
				 		for(var i = 0; i < productArray.length; i++){
				 			string = string.concat('<option name="'+ productArray[i].id + '" value=""> ' + productArray[i].name + '</option>');
				 		}
				 		document.getElementById("selectProduct").innerHTML = string;

				  </script>

<form method="POST" action="deleteProduct.php"><table id="table1"></table></form>
<form method="POST" action="addProduct.php">
<table align='center' cellspacing=2 cellpadding=5 id="data_table" border=0>
<tr>
<th colspan=0>Add New Product</th> <td> <input type="submit" class="selectorButton" name="add" value="Add"></td>
</tr>
<tr>
<th> Name <input type="text" name="name"></th>
<th> Origin <input type="text" name="origin"></th>
<th> Quantity <input type="text" name="quantity"></th>
<th> Discount Price <input type="text" name="discount"></th>
<th> Price <input type="text" name="price"></th>
<th> Description <input type="text" name="description"></th>
<th> Image <input type="text" name="image_ref"></th>
<th> Aisle <select name="aisle"><option>Fruits & Vegetables</option><option>Dairy & Eggs</option><option>Meat & Poultry</option><option>Fish & Seafood</option></select></th>
<th> Quantity per unit <input type="text" name="numOfItems"></th>
<th> Popular <input type="checkbox" name="popular"></input></th>

</tr>
</form>

</table>

</div>

</body>
<?php include "footer.html" ?>
</html>