<script>
	var jsvar;
	var productList = [];
	function getProducts(){
		<?php
		$xml = simplexml_load_file('productDataBase.xml') or die("cant load xml");
		foreach ($xml as $record) {
			if(!(empty($record->name)))
				echo "jsvar = new product('$record->name','$record->ID','$record->origin','$record->discount','$record->price','$record->description','$record->image_ref','$record->aisle','$record->aisle','$record->numOfItems','$record->quantity','$record->popular');
					productList.push(jsvar);";
		}
		?>
		console.log(productList);

		var inOrder = false;
			while(!inOrder){
				inOrder = true;
				for(let i = 0; i < productList.length-1; i++)
				{
					if(productList[i].name > productList[i+1].name){
						inOrder = false;
						var temp = productList[i];
						productList[i] = productList[i+1];
						productList[i+1] = temp;
					}
				}
			}
		return productList;
	}
</script>
