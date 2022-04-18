
<?php include "head.inc.php" ?>
<body>
	<?php include "header.html" ?>

		<div class="container">

      <script>
        var jsvar;
        var orderList = [];
        
			<?php
  $xml = simplexml_load_file('OrderDataBase.xml') or die("cant load xml");
      foreach ($xml as $record) {
        if(!(empty($record->id)))
          echo "jsvar = new order('$record->id','$record->product_quantities','$record->final_price');
        orderList.push(jsvar);";
  }
      ?>  
        </script>
		</div>
  
      <!-- create order list table -->
    <div class="orderList-container">
      <div class="row justify-content-center">
        <div class="col-lg-9">
          <div class="table-responsive mt-2">
           
            <table class="table table-striped text-center" id = "allOrders-table">
              <thead>
                <tr>
                  <td colspan = 3>
                    <h2>All Orders</h2>
                  </td>
                </tr>
                <tr>
                  <th>Order ID</th>
                  <th>Order items</th>
                  <th>Final Price of Order</th>
                 </tr>
                </thead>
              
              <tbody>
                
                <script>
                  for(var i = 0; i < orderList.length; i++) 
                  {
                    document.write("<tr>");
                    document.write("<td>"+orderList[i]["id"]+"</td>");
                    var temp = orderList[i]["product_quantities"];
			temp = "<pre>" + tester.replace(/</g, "&lt;") + "</pre>"
                    document.write("<td>"+temp+"</td>");
                    document.write("<td>"+orderList[i]["final_price"]+"</td>");
                    document.write("</tr>")  
                  }
                  
                </script>
              </tbody>
            </div>
          </div>
        </div>
      </div>

</body>

<?php include "footer.html" ?>
