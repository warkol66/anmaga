|- if $item neq '' -|
<script type="text/javascript">
	$('clientQuotationAdderMsgBox').innerHTML = 'se ha agregado el producto a la cotizacion.';
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
	$('clientQuotationAdderMsgBox').innerHTML = 'ha ocurrido un error al agregar el producto.';
</script>

|-/if-|