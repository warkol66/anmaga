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
		<input name="name" type="text" size="45" readonly="true" value="|-$product->getName()-|" class="readOnly" />
		
	</p>		
	<p>
		<label>Descripción</label>
		<textarea name="description" cols="60" rows="8" readonly="readonly" wrap="virtual" class="readOnly">|-$product->getDescription()-|</textarea>
	</p>
<!--	<p>
		<label>Cantidad</label><input name="quatity" type="text" size="10" readonly="true" class="readOnly right" value="|-$supplierQuotationItem->getQuantity()-|"/> unidades
	</p>-->
	<p>
		<label>Empaque</label>
	</p>
	<p>
		<label>El producto se embarcara en</label>
		<input type="radio" name="supplierQuotationItem[package]" value="1"  |-if $supplierQuotationItem->getPackage() eq 1-|checked="checked"|-/if-| > Empaques Unitarios
		<input type="radio" name="supplierQuotationItem[package]" value="2" |-if $supplierQuotationItem->getPackage() eq 2-|checked="checked"|-/if-|> Bultos
	</p>
	<div id="unitFormOptions">
		<h3>Dimensiones Unidad:</h3> 
		<p><label for="supplierQuotationItem[unitHeight]">Alto:</label> <input name="supplierQuotationItem[unitHeight]" type="text" value="|-$supplierQuotationItem->getUnitHeight()-|" size="6" /> 
		cm x </p>
		<p><label for="supplierQuotationItem[unitLength]">Largo:</label> <input name="supplierQuotationItem[unitLength]" type="text" value="|-$supplierQuotationItem->getUnitLength()-|" size="6" /> 
		cm x </p>
		<p><label for="supplierQuotationItem[unitWidth]">Ancho:</label> <input name="supplierQuotationItem[unitWidth]" type="text" value="|-$supplierQuotationItem->getUnitWidth()-|" size="6" />
		cm.</p>
		<p>
			<label for="supplierQuotationItem[unitGrossWeigth]">Peso Bruto Unidad:</label> <input name="supplierQuotationItem[unitGrossWeigth]" type="text" value="|-$supplierQuotationItem->getUnitGrossWeigth()-|" size="6" /> 
			kg.
		</p>
	</div>
<div id="cartonFormOptions">
		<h3>Dimensiones Bulto:</h3> 
		<p>
			<label for="supplierQuotationItem[unitsPerCarton]">Unidades por Bulto:</label> <input name="supplierQuotationItem[unitsPerCarton]" type="text" value="|-$supplierQuotationItem->getUnitsPerCarton()-|" size="8" /> 
			unidades.
		</p>
		<p>
			<label for="supplierQuotationItem[cartonHeight]">Alto: </label> <input name="supplierQuotationItem[cartonHeight]" type="text" value="|-$supplierQuotationItem->getCartonHeight()-|" size="6" /> 
			cm x </p>
		<p>
			<label for="supplierQuotationItem[cartonWidth]">Largo: </label> <input name="supplierQuotationItem[cartonLength]" type="text" value="|-$supplierQuotationItem->getCartonLength()-|" size="6" /> 
			cm x </p>
		<p>
			<label for="supplierQuotationItem[cartonWidth]">Ancho: </label> <input name="supplierQuotationItem[cartonWidth]" type="text" value="|-$supplierQuotationItem->getCartonWidth()-|" size="6" />
			cm.</p>
		<p>
			<label for="supplierQuotationItem[cartonGrossWeigth]">Peso Bruto</label>
			<input name="supplierQuotationItem[cartonGrossWeigth]" type="text" value="|-$supplierQuotationItem->getCartonGrossWeigth()-|" size="6" /> 
			kg.		</p>			
</div>
	<p>
|-assign var=incoterm value=$supplierQuotationItem->getIncoterm()-|
|-assign var=port value=$supplierQuotationItem->getPort()-|
		<label>Precio: [|-$incoterm->getName()-| |-$port->getName()-|]</label> <input name="supplierQuotationItem[price]" type="text" id="supplierQuotationItem[price]" value="|-$supplierQuotationItem->getPrice()-|" size="8"> 
	US$/u.
	</p>
	<p>
		<label>Entrega: </label> <input name="supplierQuotationItem[delivery]" type="text" value="|-$supplierQuotationItem->getDelivery()-|" size="6" /> 
	dias.</p>
	<p>
		<label>Comentarios</label>
		<textarea name="supplierQuotationItem[supplierComments]" cols="60" rows="8" wrap="virtual">|-$supplierQuotationItem->getSupplierComments()-|</textarea>
	</p>
	<p>
		<input type="hidden" name="token" value="|-$token-|" />
		<input type="hidden" name="do" value="importSupplierQuoteDoEditItem" id="do" />
		<input type="submit" value="Cotizar Item">
		<input type="button" name="cancel" value="Cancelar" onClick="javascript:history.go(-1)"/>
	</p>
	</fieldset>
</form>