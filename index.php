<?php include "head.inc.php" ?>

	<body class="m-auto">

		<?php include "header.html" ?>

		<div class="container">
			<div class="justify-content-center mb-4 row">
				<div id="carouselControls" class="carousel slide" data-ride="carousel">
				  <div class="carousel-inner m-auto p-auto">
				    <div class="carousel-item active">
				      <img class="d-block w-100" src="./img/slide1.jpg" alt="First slide [800x400]">
				    </div>
				    <div class="carousel-item">
				      <img class="d-block w-100" src="./img/slide2.jpg" alt="Second slide">
				    </div>
				    <div class="carousel-item">
				      <img class="d-block w-100" src="./img/slide3.jpg" alt="Third slide">
				    </div>
				  </div>
				  <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				  </a>
				  <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				  </a>
				</div>
			</div>

			<div class="row justify-content-center">
				<h2 class="col-lg-12 pt-2 pb-2 mb-2 primary-color" id="popular-title">Popular</h2>
			</div>

			<?php 
			$pageName = "popular";
			include "aisleDisplay.php" 
			?>

		</div>
	</body>

	<?php include "footer.html" ?>

</html>
