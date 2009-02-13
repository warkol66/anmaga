|- if $item neq '' -|
<script type="text/javascript">
	$('clientQuotationAdderMsgBox').innerHTML = '<span class="resultSuccess">Se ha agregado el producto a la solicitud</span>';
</script>

|-assign var=product value=$item->getProduct()-|
<tr>
	<td>|-$product->getCode()-|</td>
	<td>|-$product->getName()-|</td>
	<td>|-$item->getQuantity()-|</td>
	<td>|-$item->getPrice()-|</td>			
</tr>
|-else-|

<script type="text/javascript">
	$('clientQuotationAdderMsgBox').innerHTML = '<span class="resultFailure">Ha ocurrido un error al agregar el producto</span>';
</script>

|-/if-|