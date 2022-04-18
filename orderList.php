<script>
	var jsvar;
	var orderList = [];
	function getOrders(){
		<?php
		$xmlU = simplexml_load_file('orderDataBase.xml') or die("cant load xml");
		foreach ($xmlU as $order) {
			if(!(empty($order->lastName))){
				echo "jsvar = new order('$order->id','$order->product_quantities','$order->final_price');
					orderList.push(jsvar);";
			}
		}
		?>
		console.log(orderList);
		var inOrder = false;
			while(!inOrder){
				inOrder = true;
				for(let i = 0; i < orderList.length-1; i++)
				{
					if(orderList[i].lastName > orderList[i+1].lastName){
						inOrder = false;
						var temp = orderList[i];
						orderList[i] = orderList[i+1];
						orderList[i+1] = temp;
					}
				}
			}
		return orderList;
	}
</script>
