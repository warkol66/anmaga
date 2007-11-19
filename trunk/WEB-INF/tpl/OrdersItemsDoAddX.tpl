|-assign var=productNode value=$product->getNode()-| 
<tr id="row|-$item->getId()-|"> 
	<td nowrap class="tdSize1 top center">|-$product->getcode()-|</td> 
	<td class="tdSize1 top">|-$productNode->getname()-|</td> 
	<td class="tdSize1 bottom right">|-$item->getprice()|number_format:2:",":"."-|</td>
	<td class="tdSize1 bottom right"><span id="quantity|-$item->getId()-|">|-$item->getQuantity()-|</span></td> 
	<script type="text/javascript">
		editor|-$item->getId()-| = new Ajax.InPlaceEditor("quantity|-$item->getId()-|", 'Main.php?do=ordersItemsDoEditX&itemId=|-$item->getId()-|&orderId=|-$order->getId()-|', { clickToEditText : 'Editar Cantidad' });
	</script>
	<td class="tdSize1 bottom right">|-math equation="x * y" x=$item->getPrice() y=$item->getQuantity() assign=totalItem-|<span id="totalItem|-$item->getId()-|">|-$totalItem|number_format:2:",":"."-|</span></td> 
	<td class="tdSize1 bottom right">
		<input id="editButton|-$item->getId()-|"type="button" onclick="editor|-$item->getId()-|.enterEditMode();" value="Editar" class="boton" />
		<form method="post" action="Main.php" id="formRemove|-$item->getId()-|">
			<input type="hidden" name="itemId" value="|-$item->getId()-|" />
			<input type="hidden" name="orderId" value="|-$order->getId()-|" />
			<input type="hidden" name="do" value="ordersItemsDoDeleteX" />
			<input type="button" value="Remove" class="boton" onclick="ordersItemsDoDeleteX('|-$item->getId()-|')" />
		</form>
		<span  id="messageRemove|-$item->getId()-|"></span>

	</td>
</tr> 

|-if $order->getOrderItems()|@count gt 0-|
<tr id="product-total"> 
	<td colspan="5" class="tdTitle right">Total:&nbsp;&nbsp;<span id="product_total_value">|-$order->getTotal()|number_format:2:",":"."-|</span></td> 
</tr> 
|-/if-|

<script type="text/javascript">
    //<![CDATA[
    $('messageAdd').innerHTML = "";
    //]]>
</script>