|- if $item neq '' -|
<script type="text/javascript">
	if ($('productSearchMsgBox')) 
		$('productSearchMsgBox').innerHTML = '<span class="resultSuccess">Se ha agregado el producto a la solicitud</span>';
</script>

|-assign var=product value=$item->getProduct()-|
<tr id="itemProduct|-$item->getProductId()-|">
	<td>|-$product->getCode()-|</td>
	<td>|-$product->getName()-|</td>
	|-if $quantitiesOnQuotationsFlag -|
		<td>|-$item->getQuantity()-|</td>
	|-/if-|
	<td>
		<form action="Main.php" method="post">
			<input type="hidden" name="do" value="importClientQuoteDeleteItemX" />
			<input type="hidden" name="productId" value="|-$item->getProductId()-|" />
			<input type="button" name="submit_go_delete_quotation" value="Borrar" onClick="javascript:importDeleteItemFromClientQuotationX(this.form)" class="buttonImageDelete" />
		</form>
	</td>
<!--	<td>|-$item->getQuantity()-|</td> -->
<!--	<td>|-$item->getPrice()-|</td>		-->	
</tr>
|-else-|

	|-if $message eq 'already-added'-|
		<script type="text/javascript">
			if ($('productSearchMsgBox')) 
				$('productSearchMsgBox').innerHTML = '<span class="resultFailure">Ya ha agregado el producto a la solicitud</span>';
		</script>
	|-else-|
		<script type="text/javascript">
			if ($('productSearchMsgBox')) 
				$('productSearchMsgBox').innerHTML = '<span class="resultFailure">Ha ocurrido un error al agregar el producto</span>';
		</script>
	|-/if-|
|-/if-|