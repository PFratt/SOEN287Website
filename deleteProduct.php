<?php
if($_POST['delete'] !== null) {
	echo "WORKS";
	$xml = new DomDocument("1.0","UTF-8");
	$xml->load('productDataBase.xml');

	$id = $_POST["id"];

	$xpath = new DOMXPATH($xml);

	foreach ($xpath->quer("/root/product[id = '$id']") as $target) {
		$target->parentNode->removeChild($target);
	}

	$xml->formatoutput = true;
	$xml->save('productDataBase.xml');
}
?>