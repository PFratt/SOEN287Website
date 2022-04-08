<?php
if($_POST['sign-up'] !== null) {
	echo "WORKS";
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
	$id = $idNumTag;
	$lastName = $_POST["lastName"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$admin = "false";

	$rootTag = $xml->getElementsByTagName("root")->item(0);

	$productTag = $xml->createElement("user");
		$firstNameTag = $xml->createElement("firstName", $firstName);
		$idTag = $xml->createElement("ID", $id);
		$lastNameTag = $xml->createElement("lastName", $lastName);
		$emailTag = $xml->createElement("email", $email);
		$passwordTag = $xml->createElement("password", $password);
		$adminTag = $xml->createElement("admin", $admin);

	$productTag->appendChild($firstNameTag);
	$productTag->appendChild($idTag);
	$productTag->appendChild($lastNameTag);
	$productTag->appendChild($emailTag);
	$productTag->appendChild($passwordTag);
	$productTag->appendChild($adminTag);

	$rootTag->appendChild($productTag);

	$xml->save('userDataBase.xml');
}
?>

		