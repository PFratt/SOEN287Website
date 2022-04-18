
			<script>
				var jsvar;
				var productList = new Array();
				<?php
				$xml = simplexml_load_file('productDataBase.xml') or die("cant load xml");
					foreach ($xml as $record) {
						if(!(empty($record->name)))
							if($pageName == "popular"){
								if($record->popular == "true")
									echo "jsvar = new product('$record->name','$record->id','$record->origin','$record->discount_price','$record->regular_price','$record->description','$record->image_ref','$record->aisle','$record->aisle','$record->numOfItems','$record->quantity','$record->popular');
										productList.push(jsvar);";
							} else if($pageName == "all"){
									echo "jsvar = new product('$record->name','$record->id','$record->origin','$record->discount_price','$record->regular_price','$record->description','$record->image_ref','$record->aisle','$record->aisle','$record->numOfItems','$record->quantity','$record->popular');
										productList.push(jsvar);";
							} else if(strtolower($record->aisle) == $pageName)
									echo "jsvar = new product('$record->name','$record->id','$record->origin','$record->discount_price','$record->regular_price','$record->description','$record->image_ref','$record->aisle','$record->aisle','$record->numOfItems','$record->quantity','$record->popular');
										productList.push(jsvar);";
					}
				?>
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

				var aisle_location;
				var iterations = 0;
				var content = "<br/>";
				for(let i = 0; i < productList.length; i++){
					aisle_location = aisleLocation(productList[i].aisle);
					if((iterations++)%3 == 0){
						if(iterations != 1)
							content = content.concat(' </div> ');
						content = content.concat(' <div class="ml-1 mr-1 row w-100"> ');
					}
					content = content.concat('<div class="col-md food-item">' +
												'<a class="justify-content-center food" id="'+productList[i].id+'" href="productDisplay.php?product='+productList[i].id+'"><img src="'+productList[i].image_ref+'"></img></a>' +
												'<a href="'+aisle_location+'"><p class="company-name mb-0">'+productList[i].aisle+'</p></a>' +
												'<a href="productDisplay.php?product='+productList[i].id+'"><p class="food-name mt-0">'+productList[i].name+'</p></a>' +
												'</div>' );
				}
				if((productList.length%3 != 0))
				{
					var amount = productList.length%3;
					var left = 3-amount;
					for(let i = 0; i < left; i++)
					{
						content = content.concat(' <div class="col-md food-item-filler"></div> ');
					}
					content = content.concat(' </div> ');
				} else content = content.concat(' </div> ');
				content = content.concat(' </div> ');
				document.write(content);
			</script>
