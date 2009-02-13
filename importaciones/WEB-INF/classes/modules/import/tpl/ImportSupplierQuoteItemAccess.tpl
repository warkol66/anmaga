<h2>Pedido de Cotizacion</h2>
<h1>Edicion de Item de Pedido de Cotizacion</h1>

|-assign var=product value=$supplierQuotationItem->getProduct()-|

<form action="Main.php" method="post">
	<fieldset>
	<p><input type="hidden" name="supplierQuotationItem[id]" value="|-$supplierQuotationItem->getId()-|" id="supplierQuotationItem[id]" /></p>
	<p><label>Codigo de Producto</label>|-$product->getSupplierProductCode()-|</p>
	<p><label>Descripcion</label>|-$product->getDescription()-|</p>
	<p><label>Cantidad</label>|-$supplierQuotationItem->getQuantity()-| unidades</p>
	<p><label>Precio: [FOB Shanghai]</label> <input type="text" name="supplierQuotationItem[price]" value="" id="supplierQuotationItem[price]"> Dolares por unidad.</p>
	<p>
		<input type="hidden" name="token" value="|-$token-|" />
		<input type="hidden" name="do" value="importSupplierQuoteDoEditItem" id="do" />
		<input type="submit" value="Enviar Cotizacion de Producto">
	</p>
	</fieldset>
</form>