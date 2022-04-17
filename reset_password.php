<?php include "head.inc.php" ?>

<body>

<?php include "header.html" ?>

<div class = "container mt-3 pt-3">
    <div class = "row">
	  <div class = "col-15 col-sm-15 col-md-30 m-auto">
	      <div class = "card-transparent">
	          <div class = "card-body">
					<div class="card-body align-items-center d-flex justify-content-center">
						<form class= ".login-form" action="" method="post">
						<label for = "title"><h1> Reset Password </h1></label>
						<p>Enter the email address which is linked with your ShopiFood account.</p>
	                                        <p>If you did not forget your password, sign in <a href="login.php">here</a></p>
						<input type ="text" name = "email" value = "" placeholder = "Email address" >
						</br>
						<input type ="submit" name="Continue" value = "Continue" class = "submit-button";></input>
						</br>
					</div>

				</div>
			</div>
  		</div>
	</div>
</div>
</body>

<?php include "footer.html" ?>

</html>
