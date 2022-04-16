<!DOCTYPE html>
<html lang="en" dir="ltr">
  <!-- inlcude the head file -->
  <?php include "head.inc.php" ?>
  <!-- connect the JavaScript file -->
  <script type="text/javascript" src="shoppingCart.js"></script>
  <!-- link the shoppingCart CSS file -->
  <link rel="stylesheet" href="shoppingCart.css">
  <?php include "productList.php"?>
  <script type="text/javascript">
    var productArray = getProducts();
    var productIDs = getIDs();
    var count = 0;
    for(var i = 0; i < productIDs.length; i++)
    {
      if(productIDs[i][1] > 0)
      {
        count++;
      }
    }
  </script>
  <body>
    <!-- include the navbar header -->
    <?php include "header.html" ?>
    <!-- create shopping cart table -->
    <div class="shoppingCart-container">
      <div class="row justify-content-center">
        <div class="col-lg-9">
          <div class="table-responsive mt-2">
            <form class="shoppingCart-form" action="" method="post">
              <table class="table table-striped text-center" id="shoppingCart-table">
                <thead>
                  <tr>
                    <td colspan="6">
                      <h2>Shopping Cart Items</h2>
                    </td>
                  </tr>
                  <tr>
                    <th>Product</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <script type="text/javascript">

                  if(count > 0)
                  {
                    for(var i = 0; i < productIDs.length; i++)
                    {
                      for(var j = 0; j < productArray.length; j++)
                      {
                        if(productIDs[i][0].substring(1, productIDs[i][0].length) == productArray[j]["id"] && productIDs[i][1] > 0)
                        {
                          document.write("<tr>");
                          document.write("<td class=\"shoppingCart-image\"><img src="+productArray[j]["image_ref"]+" class=\"img-fluid\" alt="+productArray[j]["name"]+"></td>");
                          document.write("<td>"+productArray[j]["description"]+"</td>");
                          if(productArray[j]["discount_price"] == "null")
                          {
                            document.write("<td>"+(productArray[j]["regular_price"]*1).toFixed(2)+"</td>");
                          }
                          else
                          {
                            document.write("<td>"+(productArray[j]["discount_price"]*1).toFixed(2)+"</td>");
                          }
                          document.write("<td><input type=\"number\" id="+productIDs[i][0]+" value="+productIDs[i][1]+" class=\"form-control\" onchange=\"calculateRowTotal(this, value); saveData(id, value)\" min=\"1\"></td>");
                          if(productArray[j]["discount_price"] == "null")
                          {
                            document.write("<td>"+(productArray[j]["regular_price"]*productIDs[i][1]).toFixed(2)+"</td>");
                          }
                          else
                          {
                            document.write("<td>"+(productArray[j]["discount_price"]*productIDs[i][1]).toFixed(2)+"</td>");
                          }
                          document.write("<td><button type=\"button\" class=\"btn\" onclick=\"deleteRow(this)\"><i class=\"fa fa-trash fa-lg\"></i></button></td>");
                          document.write("</tr>");
                        }
                      }
                    }
                  }

                  else
                  {
                      document.write("<tr><td colspan=\"6\"><strong font-size:\"large\>Your Cart Is Empty!</strong></td></tr>");
                  }


                  //var productArray = getProducts();
                  // for(var i = 0; i < productArray.length; i++)
                  // {
                  //   document.write("<tr>");
                  //   document.write("<td class=\"shoppingCart-image\"><img src="+productArray[i]["image_ref"]+" class=\"img-fluid\" alt="+productArray[i]["name"]+"></td>");
                  //   document.write("<td>"+productArray[i]["description"]+"</td>");
                  //   if(productArray[i]["discount_price"] == "null")
                  //   {
                  //     document.write("<td>"+productArray[i]["regular_price"]+"</td>");
                  //   }
                  //   else
                  //   {
                  //     document.write("<td>"+productArray[i]["discount_price"]+"</td>");
                  //   }
                  //   document.write("<td><input type=\"number\" value="+productArray[i]["quantity"]+" class=\"form-control\" min=\"1\"></td>");
                  //   if(productArray[i]["discount_price"] == "null")
                  //   {
                  //     document.write("<td>"+productArray[i]["regular_price"]*productArray[i]["quantity"]+"</td>");
                  //   }
                  //   else
                  //   {
                  //     document.write("<td>"+productArray[i]["discount_price"]*productArray[i]["quantity"]+"</td>");
                  //   }
                  //   document.write("<td><button type=\"button\" class=\"btn\"><i class=\"fa fa-trash fa-lg\"></i></button></td>");
                  //   document.write("</tr>");
                  // }
                  </script>
                  <!-- <tr>
                    <td class="shoppingCart-image"><img src="./img/apple.jpg" class="img-fluid" alt="apple"></td>
                    <td>Apples (2 lb bag)</td>
                    <td>1.99</td>
                    <td><input type="number" id="inputApple" value="1" class="form-control" onchange="calculateRowTotal(this, value); saveData(id, value)" min="1"></td>
                    <td>1.99</td>
                    <td><button type="button" class="btn" onclick="resetRow(this), saveClearedData(this)"><i class="fa fa-trash fa-lg"></i></button></td>
                  </tr>-->
                </tbody>
              </table>
            </form>
          </div>
        </div>
        <!-- creating the condensed table on the right -->
        <div class="col-lg-2">
          <div class="table-responsive table-striped mt-2">
            <form class="checkout-form" action="" method="post">
              <table class="table text-center" id="checkout-table">
                <thead>
                  <br><br><br>
                  <tr>
                    <th colspan="2">
                      <script type="text/javascript">
                        document.write("<h4><strong>Checkout("+count+")</strong></h4>");
                      </script>
                    </th>
                  </tr>
                  <th>Item</th>
                  <th>Price</th>
                </thead>
                <tbody>
                  <script type="text/javascript">
                  //var productArray = getProducts();
                  for(var i = 0; i < productIDs.length; i++)
                  {
                    for(var j = 0; j < productArray.length; j++)
                    {
                      if(productIDs[i][0].substring(1, productIDs[i][0].length) == productArray[j]["id"] && productIDs[i][1] > 0)
                      {
                        document.write("<tr>");
                        document.write("<td>"+productArray[j]["name"]+"</td>");
                        if(productArray[j]["discount_price"] == "null")
                        {
                          document.write("<td>"+(productArray[j]["regular_price"]*productIDs[i][1]).toFixed(2)+"</td>");
                        }
                        else
                        {
                          document.write("<td>"+(productArray[j]["discount_price"]*productIDs[i][1]).toFixed(2)+"</td>");
                        }
                        document.write("</tr>");
                      }
                    }
                  }
                  </script>
                  <!-- <tr>
                    <td>Apples</td>
                    <td>1.99</td>
                  </tr> -->
                </tbody>
                <tfoot>
                  <tr>
                    <td class="secondary-color">Subtotal</td>
                    <td class="secondary-color">0.00</td>
                  </tr>
                  <tr>
                    <td class="secondary-color">GST</td>
                    <td class="secondary-color">0.00</td>
                  </tr>
                  <tr>
                    <td class="secondary-color">QST</td>
                    <td class="secondary-color">0.00</td>
                  </tr>
                  <tr>
                    <td class="secondary-color">Total</td>
                    <td class="secondary-color">0.00</td>
                  </tr>
                  <tr>
                    <td class="secondary-color">
                      <button type="button" class="btn" onclick="window.location.href = 'index.php'">Continue Shopping</button>
                    </td>
                    <td class="secondary-color">
                      <button type="button" class="btn" onclick="checkout();addOrderToList()">Checkout&nbsp&nbsp<i class="fa fa-credit-card-alt"></i></button>
                    </td>
                  </tr>
                  <script type="text/javascript">
                  if(count > 0)
                  {
                    calculateTotal();
                  }
                  </script>
                </tfoot>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </body>

  <script type="text/javascript">
    var loops = 10-2*count;

    for(var i = 0; i < loops; i++)
    {
      document.write("<br>");
    }
  </script>
  <!-- include the footer -->
  <?php include "footer.html" ?>
</html>
