<?php include "head.inc.php" ?>

<body>
<?php include "header.html" ?>
<div class = "container mt-3 pt-3">
    <div class = "row">
	  <div class = "col-15 col-sm-15 col-md-30 m-auto">
	      <div class = "card-transparent">
	          <div class = "card-body">
					<div class="card-body align-items-center d-flex justify-content-center">
						<form class= ".login-form" action="sign-up.php" method="post">
						<label><h1> Sign up </h1></label>
						</br>
						<label>First Name</label>
						</br>
						<input onchange = "isFirstNameValid()" type ="text" id = "frstName" name="firstName" value = "" placeholder = "" >
						</br>

						<label>Last Name</label>
						</br>
						<input onchange = "isLastNameValid()" type ="text" name = "lastName" id = "lstName" value = "" placeholder = "" >
						</br>

						<label>Email address: </label>
						</br>
						<input onchange = "isEmailNameValid()" type ="text" name = "email" id = "email-input" value = "" placeholder = "" >
						</br>

						<label>Password</label>
						</br>
						<input onchange = "isPasswordOneNameValid()" type ="password" name = "password" id = "passOne" value = "" placeholder = "" >
						</br>

						<label>Confirm Password</label>
						</br>
						<input onchange = "isPasswordTwoValid()" type ="password" name = "passwordConfirm" id = "passTwo" value = "" placeholder = "" >
						</br>

						<p>
						<span>
						<label>
						<input type="checkbox" checked="checked" name="Optional"> Send me email for offers and news
						</label>
						</span>
						</br>
						Already have an account?&nbsp; <a href="login.php">Sign in</a>
						<input type ="reset" name="Reset" value = "Reset" class = "reset-button"; <a href="create_account.php"></input>
						</br>
						<input type ="submit" name="sign-up" value = "Sign up" class = "submit-button";></input>
					</form>
				</div>
			</div>


		   </div>
	  </div>
  </div>
</div>
</div>
</body>

<Script> 
console.log("Injected");

function isFirstNameValid()
{
console.log("ABCD");
var usernameRegex = /^[a-zA-Z]+$/;
	if(usernameRegex.test(document.getElementById("frstName").value) == true)
	{
		return true; 
	}
	else
	{
		alert("Please enter a valid name!");
	}
}

function isLastNameValid() 
{
var usernameRegex = /^[a-zA-Z]+$/;
	if(usernameRegex.test(document.getElementById("lstName").value) == true)
	{
		return true; 
	}
	else
	{
		alert("Please enter a valid name!");
	}
}

function isEmailValid() 
{
var emailRegex = /^[a-z@.]+$/;
	if(emailRegex.test(document.getElementById("email-input").value == true))
	{
		return true; 
	}
	else
	{
		alert("Please enter a valid email address!");
	}
}

function isPasswordOneValid()
{
var emailRegex = /^(?=.*[0-9])[a-zA-Z]{5,20}$/;
if(emailRegex.test(document.getElementById("passOne").value == true))
	{
		return true; 
	}
	else
	{
		alert("Please enter a stronger password!");
	}
}

function isPasswordTwoValid()
{
var emailRegex = /^(?=.*[0-9])[a-zA-Z]{5,20}$/;
if(document.getElementById("passOne").value == document.getElementById("passTwo").value)
	{
		return true; 
	}
	else
	{
		alert("Please enter the same password!");
	}
}


</Script>
<?php include "footer.html" ?>
</html>
