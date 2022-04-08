<?php include "head.inc.php" ?>
	
<body>
	<?php include "header.html" ?>
	
	<div class="container" id="target_spot"></div>

	<?php include "productList.php" ?>

	<script>
		var productID;
		var productArray = getProducts();
		<?php
		$product = $_GET['product'];
		echo "productID = '$product';";
		?>
		productMatch(productArray,productID);
	</script>

</body>

<?php include "footer.html" ?>



<!-- /*class product {
		var $name;
		var $id;
		var $origin;
		var $discount_price;
		var $regular_price;
		var $description;
		var $image_ref;
		var $aisle;
		var $numOfItems;
		var $quantity;
		var $aisle_location;


	function __construct($name, $id, $origin, $discount_price, $regular_price, $description, $image_ref, $aisle, $aisle_location, $numOfItems, $quantity) {
		$this->name = $name;
		$this->id = $id;
		$this->origin = $origin;
		$this->discount_price = $discount_price;
		$this->regular_price = $regular_price;
		$this->description = $description;
		$this->image_ref = $image_ref;
		$this->aisle = $aisle;
		$this->numOfItems = $numOfItems;
		$this->quantity = $quantity;
		$this->aisle_location = $aisle_location;
	}
}*/ -->