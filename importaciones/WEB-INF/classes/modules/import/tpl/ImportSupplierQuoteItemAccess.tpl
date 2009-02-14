<h2>Pedido de Cotización</h2>
<h1>Edicion de Item de Pedido de Cotización</h1>

|-assign var=product value=$supplierQuotationItem->getProduct()-|

<form action="Main.php" method="post">
	<fieldset>
	<p><input type="hidden" name="supplierQuotationItem[id]" value="|-$supplierQuotationItem->getId()-|" id="supplierQuotationItem[id]" /></p>
	<p>
		<label>Código </label>
		<input name="suppliersCode" type="text" size="15" readonly="true" value="|-$product->getSupplierProductCode()-|" class="readOnly" /></p>
	<p>
		<label>Descripción</label>
		<textarea name="description" cols="70" rows="8" readonly="readonly" wrap="virtual" class="readOnly">|-$product->getDescription()-|</textarea>
	</p>
	<p><label>Cantidad</label><input name="quatity" type="text" size="10" readonly="true" class="readOnly" value="|-$supplierQuotationItem->getQuantity()-|"/> unidades</p>
	<p><label>Precio: [FOB Shanghai]</label> <input type="text" name="supplierQuotationItem[price]" value="" id="supplierQuotationItem[price]"> 
	US$/u.</p>
	<p>
		<input type="hidden" name="token" value="|-$token-|" />
		<input type="hidden" name="do" value="importSupplierQuoteDoEditItem" id="do" />
		<input type="submit" value="Enviar Cotizacion de Producto">
	</p>
	</fieldset>
</form>