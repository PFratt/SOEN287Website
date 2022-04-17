
<?php
if(!empty($_POST['add'])) {
	$xml = new DomDocument("1.0","UTF-8");
	$xml->load('userDataBase.xml');

	$xpath = new DOMXPATH($xml);

	foreach ($xpath->query("//idNumber") as $target) {
		$idNumTag = $target->nodeValue;
		echo $target->nodeValue;
		$target->nodeValue = $idNumTag+1;
	}

	$xml->formatoutput = true;
	$xml->save('userDataBase.xml');

	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$ID = $idNumTag+1;
	$email = $_POST["email"];
	$password = $_POST["password"];
	$admin = $_POST["admin"];
	if($admin == null){
		$admin = "false";
	} else $admin = "true";

	$rootTag = $xml->getElementsByTagName("root")->item(0);

	$userTag = $xml->createElement("user");
		$firstNameTag = $xml->createElement("firstName", $firstName);
		$lastNameTag = $xml->createElement("lastName", $lastName);
		$IDTag = $xml->createElement("ID", $ID);
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
	var jsvar = "";
	<?php 
		echo "jsvar = '$ID';";
	?>
	alert("User with id "+jsvar+" has been created.");
	window.location.href = "index.php";
</script>