
<?php include "head.inc.php" ?>

	
<body>
	<?php include "header.html" ?>
	
	<div class="container" id="target_spot"></div>

	<?php include "productList.php" ?>



	<script>
		var productArray = getProducts();
		console.log(productArray);
	</script>

</body>
<?php include "footer.html" ?>
