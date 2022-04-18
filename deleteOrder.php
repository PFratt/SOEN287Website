
<script>
	var delVar = null;
	var upVar = null;
</script>
<?php
if(!empty($_POST['delete'])) {
	$xml = new DomDocument("1.0","UTF-8");
	$xml->load('orderDataBase.xml');

	$list = $xml->getElementsByTagName("order");

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
	$xml->save('orderDataBase.xml');

}


if(!empty($_POST['update'])) {
	$xml = new DomDocument("1.0","UTF-8");
	$xml->load('orderDataBase.xml');

	$id = $_POST["ID"];
	$product_quantities  = $_POST["product_quantities "];
	$final_price = $_POST["final_price"];
	if($admin == null){
		$admin = "false";
	} else $admin = "true";

	$list = $xml->getElementsByTagName("order");

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

	$orderTag = $xml->createElement("order");
		$idTag = $xml->createElement("id", $id);
		$product_quantitiesTag = $xml->createElement("product_quantities", $product_quantities);
		$final_PriceTag = $xml->createElement("final_price", $final_price);


	$orderTag->appendChild($idTag);
	$orderTag->appendChild($product_quantitiesTag);
	$orderTag->appendChild($final_PriceTag);
	

	$rootTag->appendChild($orderTag);

	$xml->save('orderDataBase.xml');

}

?>

<script>
	<?php 
	if(!empty($_POST['update']))
		echo "upVar = '$id';";
	else echo "delVar = '$id';";
	?>
if(delVar == null){
	alert("Order with id " + upVar + " has been successfully modified.");
	window.location.href = "allOrders.php";
} else {
	alert("Order with id " + delVar + " has been successfully deleted.");
	window.location.href = "allOrder.php";
}

</script>
