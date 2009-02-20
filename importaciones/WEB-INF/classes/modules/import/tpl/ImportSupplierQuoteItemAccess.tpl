<script type="text/javascript">
	function showUnitOptions() {
		$('unitFormOptions').show();
		$('cartonFormOptions').hide();
		return true;
	}
	
	function showCartonOptions() {
		$('cartonFormOptions').show();
		$('unitFormOptions').hide();
		return true;
	}
</script>

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
		<input name="suppliersCode" type="text" size="15" readonly="true" value="|-$product->getSupplierProductCode()-|" class="readOnly" />
	</p>
	<p>
		<label>Producto</label>
		|-$product->getName()-|
	</p>		
	<p>
		<label>Cantidad</label><input name="quatity" type="text" size="10" readonly="true" class="readOnly" value="|-$supplierQuotationItem->getQuantity()-|"/> unidades
	</p>
	<p>
		<label>Empaque</label>
	</p>
	<p>
		<label>El producto se embarcara en</label>
		<input type="radio" name="supplierQuotationItem[package]" value="1" onClick="javascript:showUnitOptions()" checked="checked"> Empaques Unitarios
		<input type="radio" name="supplierQuotationItem[package]" value="2" onClick="javascript:showCartonOptions()"> Bultos
	</p>
	<div id="unitFormOptions">
		<p><label for="unitDimensions">Dimensiones Unidad:</label> Alto: <input type="text" name="supplierQuotationItem[unitHeight]" value="" /> cm x Largo: <input type="text" name="supplierQuotationItem[unitLength]" value="" /> cm x Ancho: <input type="text" name="supplierQuotationItem[unitWidth]" value="" />cm.
		</p>
		<p>
			<label for="supplierQuotationItem[unitGrossWeigth]">Peso Bruto Unidad:</label> <input type="text/submit/hidden/button" name="supplierQuotationItem[unitGrossWeigth]" value="" /> kg.
			
		</p>
	</div>
	<div id="cartonFormOptions" style="display: none;">
		<p>
			<label for="supplierQuotationItem[unitsPerCarton]">Unidades por Bulto:</label> <input type="text" name="supplierQuotationItem[unitsPerCarton]" value="" /> unidades.
		</p>
		<p><label for="Dimensions">Dimensiones Bulto:</label> Alto: <input type="text" name="supplierQuotationItem[cartonHeight]" value="" /> cm x Largo: <input type="text" name="supplierQuotationItem[cartonLength]" value="" /> cm x Ancho: <input type="text" name="supplierQuotationItem[cartonWidth]" value="" />cm.
		</p>
		<p>
			<label for="supplierQuotationItem[cartonGrossWeigth]">Peso Bruto</label><input type="text/submit/hidden/button" name="supplierQuotationItem[cartonGrossWeigth]" value="" /> kg.

		</p>			
	</div>
	<p>
		<label>Descripción</label>
		<textarea name="description" cols="70" rows="8" readonly="readonly" wrap="virtual" class="readOnly">|-$product->getDescription()-|</textarea>
	</p>
	<p><label>Incoterm</label>|-assign var=incoterm value=$supplierQuotationItem->getIncoterm()-| |-$incoterm->getName()-|</p>
	<p><label>Puerto</label>|-assign var=port value=$supplierQuotationItem->getPort()-| |-$port->getName()-|</p>
	<p>
		<label>Precio: [FOB Shanghai]</label> <input type="text" name="supplierQuotationItem[price]" value="" id="supplierQuotationItem[price]"> 
	US$/u.
	</p>
	<p>
		<label>Entrega: </label> <input type="text" name="supplierQuotationItem[delivery]" value="" /> 
	dias.</p>
	<p>
		<label>Comentarios</label>
		<textarea name="supplierQuotationItem[supplierComments]" cols="70" rows="8"></textarea>
	</p>
	<p>
		<input type="hidden" name="token" value="|-$token-|" />
		<input type="hidden" name="do" value="importSupplierQuoteDoEditItem" id="do" />
		<input type="submit" value="Cotizar Item">
		<input type="button" name="cancel" value="Cancelar" onClick="javascript:history.go(-1)"/>
	</p>
	</fieldset>
</form>