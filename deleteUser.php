<script>
	var delVar = null;
	var upVar = null;
</script>
<?php
if(!empty($_POST['delete'])) {
	$xml = new DomDocument("1.0","UTF-8");
	$xml->load('userDataBase.xml');

	$list = $xml->getElementsByTagName("user");

	$id = $_POST["ID"];
	$targetNode = null;

	foreach($list as $domElement){
		$IDNUMTag = $domElement->getElementsByTagName("ID");
		$attrValue = $IDNUMTag->item(0)->nodeValue;
		if($attrValue == $id){
			$targetNode = $domElement;
		}
	}

	if($targetNode != null){
		$targetNode->parentNode->removeChild($targetNode);
	}

	$xml->formatoutput = true;
	$xml->save('userDataBase.xml');

}


if(!empty($_POST['update'])) {
	$xml = new DomDocument("1.0","UTF-8");
	$xml->load('userDataBase.xml');

	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$id = $_POST["ID"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$admin = $_POST["admin"];
	if($admin == null){
		$admin = "false";
	} else $admin = "true";

	$list = $xml->getElementsByTagName("user");

	$targetNode = null;

	foreach($list as $domElement){
		$IDNUMTag = $domElement->getElementsByTagName("ID");
		$attrValue = $IDNUMTag->item(0)->nodeValue;
		if($attrValue == $id){
			$targetNode = $domElement;
		}
	}

	if($targetNode != null){
		$targetNode->parentNode->removeChild($targetNode);
	}

	$rootTag = $xml->getElementsByTagName("root")->item(0);

	$userTag = $xml->createElement("user");
		$firstNameTag = $xml->createElement("firstName", $firstName);
		$lastNameTag = $xml->createElement("lastName", $lastName);
		$IDTag = $xml->createElement("ID", $id);
		$emailTag = $xml->createElement("email", $email);
		$passwordTag = $xml->createElement("password", $password);
		$adminTag = $xml->createElement("admin", $admin);


	$userTag->appendChild($firstNameTag);
	$userTag->appendChild($lastNameTag);
	$userTag->appendChild($IDTag);
	$userTag->appendChild($emailTag);
	$userTag->appendChild($passwordTag);
	$userTag->appendChild($adminTag);
	

	$rootTag->appendChild($userTag);

	$xml->save('userDataBase.xml');

}

?>

<script>
	<?php 
	if(!empty($_POST['update']))
		echo "upVar = '$id';";
	else echo "delVar = '$id';";
	?>
if(delVar == null){
	alert("User with id " + upVar + " has been successfully modified.");
	window.location.href = "allUsers.php";
} else {
	alert("User with id " + delVar + " has been successfully deleted.");
	window.location.href = "allUsers.php";
}

</script>