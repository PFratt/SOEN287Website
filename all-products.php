<?php $xml = simplexml_load_file('productDataBase.xml') or die("cant load xml"); ?>

<?php include "head.inc.php" ?>
<body>
	<?php include "header.html" ?>

		<div class="container">

			<div class="row justify-content-center">
				<h2 class="col-md pt-2 pb-2 mb-2 primary-color aisle-title">All Products</h2>
			</div>

			<?php 
			$pageName = "all";
			include "aisleDisplay.php" 
			?>

		</div>

</body>

<?php include "footer.html" ?>