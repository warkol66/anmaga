|- if $item neq '' -|
<script type="text/javascript">
	$('clientQuotationAdderMsgBox').innerHTML = 'se ha agregado el producto a la cotizacion.';
</script>

<li id="itemList_|-$item->getId()-|">
		|-assign var=product value=$item->getProduct()-|
		<strong>Codigo: |-$product->getCode()-|</strong>
		<strong>Nombre: |-$product->getName()-|</strong>
		<strong>Cantidad:</strong> |-$item->getQuantity()-|</strong>
		<strong>Precio Unitario:</strong> |-$item->getPrice()-|</strong>
</li>
|-else-|

<script type="text/javascript">
	$('clientQuotationAdderMsgBox').innerHTML = 'ha ocurrido un error al agregar el producto.';
</script>

|-/if-|