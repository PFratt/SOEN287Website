

<script>
  <?php
  function addOrderToList(){

	  alert("success")


if($_POST['add'] !== null) {
	echo "WORKS";
	$xml = new DomDocument("1.0","UTF-8");
	$xml->load('orderDataBase.xml');

	$xpath = new DOMXPATH($xml);

	foreach ($xpath->query("//idNumber") as $target) {
		$idNumTag = $target->nodeValue;
		echo $target->nodeValue;
		$target->nodeValue = $idNumTag+1;
	}

	$xml->formatoutput = true;
	$xml->save('orderDataBase.xml');

	$id = $idNumTag+1;
	$product_quantities = $_POST["product_quantities"];
	$final_price = $_POST["final_price"];
	$user = $_POST["user"];

	$rootTag = $xml->getElementsByTagName("root")->item(0);

	$orderTag = $xml->createElement("order");
		$idTag = $xml->createElement("id", $id);
		$product_quantitiesTag = $xml->createElement("product_quantities", $product_quantities);
		$final_PriceTag = $xml->createElement("final_price", $final_price);
	$userTag = $xml->createElement("user", $user);


	$orderTag->appendChild($idTag);
	$orderTag->appendChild($product_quantitiesTag);
	$orderTag->appendChild($final_PriceTag);
	$orderTag->appendChild($userTag);


	$rootTag->appendChild($orderTag);

	$xml->save('productDataBase.xml');
}


  }
	?>
  </script>

