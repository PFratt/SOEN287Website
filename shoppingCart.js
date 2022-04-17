function checkout()
{
  alert("Thank you for your payment!")
}

function getIDs()
{
  var productList = [];
  for (var i = 0; i < sessionStorage.length; i++)
  {
    var key = sessionStorage.key(i);

    if(key[0] == '@')
    {
      productList.push([key, sessionStorage.getItem(key)]);
    }
  }
  return productList;
}

function saveData(id, value)
{
    sessionStorage.setItem(id, value);
}

function calculateRowTotal(element, value)
{
  var rowIndex = $(element).closest('tr').index() + 1;
  var shoppingCartTable = document.getElementById('shoppingCart-table');
  var checkoutTable = document.getElementById('checkout-table');

  var quantity;
  if(value > 0)
  {
     quantity = value;
  }
  else
  {
    quantity = 1;
    element.value = 1;
  }

  var price = shoppingCartTable.rows[rowIndex].cells[2].innerHTML;

  shoppingCartTable.rows[rowIndex].cells[4].innerHTML = (quantity * price).toFixed(2);
  checkoutTable.rows[rowIndex].cells[1].innerHTML = (quantity * price).toFixed(2);

  calculateTotal();
}

function calculateTotal()
{
  var total = 0.00;
  var shoppingCartTable = document.getElementById('shoppingCart-table');
  var checkoutTable = document.getElementById('checkout-table');
  for(let i = 2; i < shoppingCartTable.rows.length; i++)
  {
    total += parseFloat(shoppingCartTable.rows[i].cells[4].innerHTML);
  }

  var GST = 0.05 * total;
  var QST = 0.0975 * total;

  checkoutTable.rows[checkoutTable.rows.length-5].cells[1].innerHTML = total.toFixed(2);
  checkoutTable.rows[checkoutTable.rows.length-4].cells[1].innerHTML = GST.toFixed(2);
  checkoutTable.rows[checkoutTable.rows.length-3].cells[1].innerHTML = QST.toFixed(2);
  checkoutTable.rows[checkoutTable.rows.length-2].cells[1].innerHTML = (total+GST+QST).toFixed(2);
}

function deleteRow(buttonObject)
{
  var rowIndex = $(buttonObject).closest('tr').index() + 1;
  var shoppingCartTable = document.getElementById('shoppingCart-table');
  // var checkoutTable = document.getElementById('checkout-table');

  // shoppingCartTable.rows[rowIndex].cells[3].getElementsByTagName('input')[0].value = 0;
  // shoppingCartTable.rows[rowIndex].cells[4].innerHTML = shoppingCartTable.rows[rowIndex].cells[2].innerHTML;
  // checkoutTable.rows[rowIndex].cells[1].innerHTML = shoppingCartTable.rows[rowIndex].cells[2].innerHTML;
  saveData(shoppingCartTable.rows[rowIndex].cells[3].getElementsByTagName('input')[0].id, 0);
  window.location.reload();
}


function getTotal()
{
  var total = 0.00;
  var shoppingCartTable = document.getElementById('shoppingCart-table');
  var checkoutTable = document.getElementById('checkout-table');
  for(let i = 2; i < shoppingCartTable.rows.length; i++)
  {
    total += parseFloat(shoppingCartTable.rows[i].cells[4].innerHTML);
  }

  var GST = 0.05 * total;
  var QST = 0.0975 * total;
  var final = parseFloat(total+GST+QST);
  
  return final;
}
