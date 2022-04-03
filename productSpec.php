<?php include "head.inc.php" ?>
<body>
  <?php include "header.html" ?>
<div id="wrapper">
<table align='center' cellspacing=2 cellpadding=5 id="data_table" border=2>
<tr>
<th colspan=5>Product Specifics</th>
</tr>
<form method="POST" action="addProduct.php">
<tr>
<th> Name <input type="text" name="name"></th>
<th> Origin <input type="text" name="origin"></th>
<th> Quantity <input type="text" name="quantity"></th>
</tr>
<tr>
<th> Discount Price <input type="text" name="discount"></th>
<th> Price <input type="text" name="price"></th>
<th> Description <input type="text" name="description"></th>
</tr>
<tr>
<th> Image <input type="text" name="image_ref"></th>
<th> Aisle <input type="text" name="aisle"></th>
<th> Quantity per unit <input type="text" name="numOfItems"></th>
</tr>
<tr>
<td> <input type="submit" name="add" value="add"></td>
</tr>
</form>

</table>

<?php include "footer.html" ?>

</html>
