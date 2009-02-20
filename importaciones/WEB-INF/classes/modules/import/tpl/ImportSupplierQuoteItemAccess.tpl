|-assign var=product value=$supplierQuotationItem->getProduct()-|
<h2>Solicitud de Cotización</h2>
<h1>Cotización de Producto "|-$product->getSupplierProductCode()-|"</h1>
<p>A continuación podrá ingresar los datos de la cotización del producto |-$product->getSupplierProductCode()-|. Para guardar el precio y confirmar la cotización del producto, haga click en "Cotizar Item". Recuerde que una vez guardado el precio, no podrá modificarlo.
<form action="Main.php" method="post">
	<fieldset>
		<legend>Detalle del producto</legend>
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
		<input type="submit" value="Cotizar Item">
	</p>
	</fieldset>
</form>