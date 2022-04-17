
<?php include "head.inc.php" ?>

<body>

	<?php include "header.html" ?>	

<div class = "container mt-3 pt-3">
    <div class = "row">
	  <div class = "col-15 col-sm-15 col-md-30 m-auto">
	      <div class = "card-transparent">
	          <div class = "card-body">
					<div class="card-body align-items-center d-flex justify-content-center">
						<div>
						<label><h1> Sign in </h1></label>
						</br>
						<label>Enter your email address: </label>
						</br>
						<input type ="text" name = "email" id="email-input" value = "" placeholder = "Email address" >
						</br>

						<label>Enter your password: </label>
						</br>
						<input type ="password" name = "password" id="password-input" value = "" placeholder = "********" >
						</br>
						
						<p>
						<span>
						<label>
						<input type="checkbox" checked="checked" name="Remember"> Remember me
						</label>
						</br>
						Forgot your <a href="reset_password.php">password?</a>
						</span>
						</br>
						Don't have an account?&nbsp;<a href="create_account.php">Create account?</a>

						<?php include 'userList.php' ?>

						<script>
							function login()
							{
								console.log("Injection");
								var users = getUsers();
								var mySize = users.length;
								var user_email = document.getElementById("email-input").value;
								var user_pass = document.getElementById("password-input").value;
								var userExist = false;
								var targetUser = null;
								
								for (var i = 0; i < mySize ; i++) 
								{
									if(users[i].email == user_email && users[i].password == user_pass)
									{
										userExist = true;
										sessionStorage.clear();
										var userID = users[i].id;
										targetUser = users[i];
										sessionStorage.setItem("userID",userID);
										break;
									}

								}
								if(!userExist){
									alert("Incorrect email address and/or password");
								} else {
									if(targetUser.admin == "true")
										window.location.href = "productSpec.php";
									else{
										window.location.href = "index.php";
									}
								}

							}
						</script>

						<button  onclick="login();" class="submit-button"> Sign in </button>
						</div>
				  	</div>
				</div>
			</div>
  		</div>
	</div>
</div>


</body>
	
<?php include "footer.html" ?>

</html>
