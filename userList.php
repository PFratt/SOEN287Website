
<script>
	var jsvar;
	var userList = [];
	function getUsers(){
		<?php
		$xmlU = simplexml_load_file('userDataBase.xml') or die("cant load xml");
		foreach ($xmlU as $user) {
			if(!(empty($user->lastName))){
				echo "jsvar = new user('$user->firstName','$user->lastName','$user->ID','$user->email','$user->password','$user->admin');
					userList.push(jsvar);";
			}
		}
		?>
		console.log(userList);
		var inOrder = false;
			while(!inOrder){
				inOrder = true;
				for(let i = 0; i < userList.length-1; i++)
				{
					if(userList[i].lastName > userList[i+1].lastName){
						inOrder = false;
						var temp = userList[i];
						userList[i] = userList[i+1];
						userList[i+1] = temp;
					}
				}
			}
		return userList;
	}
</script>
