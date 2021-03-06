<script>
	var delVar = null;
	var upVar = null;
</script>
<?php
if(!empty($_POST['delete'])) {
	$xml = new DomDocument("1.0","UTF-8");
	$xml->load('productDataBase.xml');

	$list = $xml->getElementsByTagName("product");

	$id = $_POST["id"];
	$targetNode = null;

	foreach($list as $domElement){
		$IDNUMTag = $domElement->getElementsByTagName("id");
		$attrValue = $IDNUMTag->item(0)->nodeValue;
		if($attrValue == $id){
			$targetNode = $domElement;
		}
	}

	if($targetNode != null){
		$targetNode->parentNode->removeChild($targetNode);
	}

	$xml->formatoutput = true;
	$xml->save('productDataBase.xml');

}


if(!empty($_POST['update'])) {
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
	if($popular == null)
		$popular = "false";
	else $popular = "true";

	$list = $xml->getElementsByTagName("product");

	$targetNode = null;

	foreach($list as $domElement){
		$IDNUMTag = $domElement->getElementsByTagName("id");
		$attrValue = $IDNUMTag->item(0)->nodeValue;
		if($attrValue == $id){
			$targetNode = $domElement;
		}
	}

	if($targetNode != null){
		$targetNode->parentNode->removeChild($targetNode);
	}

	$rootTag = $xml->getElementsByTagName("root")->item(0);

	$productTag = $xml->createElement("product");
		$nameTag = $xml->createElement("name", $name);
		$idTag = $xml->createElement("id", $id);
		$originTag = $xml->createElement("origin", $origin);
		$discountTag = $xml->createElement("discount_price", $discount_price);
		$priceTag = $xml->createElement("regular_price", $price);
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

<script>
	<?php 
	if(!empty($_POST['update']))
		echo "upVar = '$id';";
	else echo "delVar = '$id';";
	?>
if(delVar == null){
	alert("Product with id " + upVar + " has been successfully modified.");
	window.location.href = "allProducts.php";
} else {
	alert("Product with id " + delVar + " has been successfully deleted.");
	window.location.href = "allProducts.php";
}

</script>