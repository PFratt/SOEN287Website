<?php
if($_POST['delete'] !== null) {
	echo "WORKS";
	$xml = new DomDocument("1.0","UTF-8");
	$xml->load('productDataBase.xml');

	$id = $_POST["id"];

	$xpath = new DOMXPATH($xml);

	foreach ($xpath->query("/root/product[id = '$id']") as $target) {
		$target->parentNode->removeChild($target);
	}

	$xml->formatoutput = true;
	$xml->save('productDataBase.xml');
}


if($_POST['update'] !== null) {
	echo "WORKS";
	$xml = new DomDocument("1.0","UTF-8");
	$xml->load('productDataBase.xml');

	$id = $_POST["id"];
	$name = $_POST["name"];
	$origin = $_POST["origin"];
	$discount_price = $_POST["discount"];
	if(empty($discount_price))
		$discount_price = "null";
	$price = $_POST["price"];
	$description = $_POST["description"];
	$image_ref = $_POST["image_ref"];
	$aisle = $_POST["aisle"];
	$numOfItems = $_POST["numOfItems"];
	$quantity = $_POST["quantity"];
	$popular = $_POST["popular"];

	$xpath = new DOMXPATH($xml);

	foreach ($xpath->query("/root/product[id = '$id']") as $target) {
		$target->parentNode->removeChild($target);
	}

	$rootTag = $xml->getElementsByTagName("root")->item(0);

	$productTag = $xml->createElement("product");
		$nameTag = $xml->createElement("name", $name);
		$idTag = $xml->createElement("ID", $id);
		$originTag = $xml->createElement("origin", $origin);
		$discountTag = $xml->createElement("discount", $discount_price);
		$priceTag = $xml->createElement("price", $price);
		$descriptionTag = $xml->createElement("description", $description);
		$image_refTag = $xml->createElement("image_ref", $image_ref);
		$aisleTag = $xml->createElement("aisle", htmlspecialchars($aisle));
		$numOfItemsTag = $xml->createElement("numOfItems", $numOfItems);
		$quantityTag = $xml->createElement("quantity", $quantity);
		$popularTag = $xml->createElement("popular", $popular);

	$productTag->appendChild($nameTag);
	$productTag->appendChild($idTag);
	$productTag->appendChild($originTag);
	$productTag->appendChild($discountTag);
	$productTag->appendChild($priceTag);
	$productTag->appendChild($descriptionTag);
	$productTag->appendChild($image_refTag);
	$productTag->appendChild($aisleTag);
	$productTag->appendChild($numOfItemsTag);
	$productTag->appendChild($quantityTag);
	$productTag->appendChild($popularTag);

	$rootTag->appendChild($productTag);

	$xml->formatoutput = true;
	$xml->save('productDataBase.xml');
}

?>