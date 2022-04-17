
 <?php include "head.inc.php" ?>

<body class="backstore">

 <?php include "header.html" ?>
 <div class="container">
	<script>
	function contentGenerate(){
		var tempUsers = document.getElementById("selectUser").options[document.getElementById("selectUser").selectedIndex].text;
		var element = null;
		for(var i = 0; i < userArray.length; i++){
			if(tempUsers == userArray[i].email){
				element = userArray[i];
			}
		}
		if(element == null){
			document.getElementById("table1").innerHTML = "";
		}
		else {
			document.getElementById("table1").innerHTML = '<tr>' +
			'<th colspan=0> User Specifics </th> <td> <input type="submit" name="update" value="Edit"></input> <input type="submit" name="delete" value="Delete"></input> </td>' +
			'</tr>' +
			'<tr>' +
			'<th> First Name <input type="text" name="firstName" value="' + element.firstName + '"></th>' +
			'<th> Last Name <input type="text" name="lastName" value="' + element.lastName + '"></th>' +
			'<th> Email <input type="text" name="email" value="' + element.email + '"></th>' +
			'<th> Password <input type="text" name="password" value="' + element.password + '"></th>' +
			'<th> User ID <input type="text" name="ID" readonly value="' + element.id + '"></th>' +
			'<th> Admin <input type="checkbox" name="admin" value="' + element.admin + '"></th>' +
			'</tr>';
		}
	}

	</script>

 	 Product List :
 				<select id="selectUser">
 					<option value="">--- Select ---</option>
 				</select>
 					<button class="selectorButton" type="submit" name="Submit" value="Select" onclick="contentGenerate();"> Select </button>

					<script>

				 	 var userArray = getUsers();
				 		var selectUserID = document.getElementById("selectUser");
				 		var string = '<option value="">--- Select ---</option>';
				 		for(var i = 0; i < userArray.length; i++){
				 			string = string.concat('<option name="'+ userArray[i].id + '" value=""> ' + userArray[i].email + '</option>');
				 		}
				 		document.getElementById("selectUser").innerHTML = string;

				  </script>

<form method="POST" action="deleteUser.php"><table id="table1"></table></form>
<form method="POST" action="addUser.php">
<table align='center' cellspacing=2 cellpadding=5 id="data_table" border=0>
<tr>
<th colspan=0>Add New User</th> <td> <input class="selectorButton" type="submit" name="add" value="Add"></td>
</tr>
<tr>
<th> First Name <input type="text" name="firstName"></th>
<th> Last Name <input type="text" name="lastName"></th>
<th> Email <input type="text" name="email"></th>
<th> Password <input type="text" name="password"></th>
<th> Admin <input type="checkbox" name="admin"></th>
</tr>
</form>

</table>

</div>

</body>

<?php include "footer.html" ?>

</html>

