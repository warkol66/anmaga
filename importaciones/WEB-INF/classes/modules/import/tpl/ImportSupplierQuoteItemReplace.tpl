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
|- assign var=product value=$supplierQuotationItem->getProduct()-|
<h2>Solicitud de Cotización</h2>
<h1>Cotización de Producto: Reemplazo de Producto "|-$product->getSupplierProductCode()-|"</h1>
<p>A continuación podrá ingresar los datos de reemplazo del |-$product->getSupplierProductCode()-|. Para guardar el producto de reemplazo y la la cotización del producto, luego de completar todos los campos haga click en "Cotizar Item". Tenga en cuenta que solo podra proponer un reemplazo al producto.
<form action="Main.php" method="post">
	<fieldset>
		<legend>Detalle del producto</legend>
		<input type="hidden" name="supplierQuotationItem[id]" value="|-$supplierQuotationItem->getId()-|" id="supplierQuotationItem[id]" />
	<p>
		<label>Código </label>
		<input type="hidden" name="productSupplier[supplierId]" value="|-$product->getSupplierId()-|" />
		<input name="productSupplier[code]" type="text" size="15" value="" />
	</p>
	<p>
		<label>Producto</label>
		<input name="product[name]" type="text" size="45" value="" />
		
	</p>		
	<p>
		<label>Descripción</label>
		<textarea name="product[description]" cols="60" rows="8" wrap="virtual"></textarea>
	</p>
<!--	<p>
		<label>Cantidad</label><input name="quatity" type="text" size="10" readonly="true" class="readOnly right" value="|-$supplierQuotationItem->getQuantity()-|"/> unidades
	</p>-->
	<p>
		<label>Empaque</label>
	</p>
	<p>
		<label>El producto se embarcara en</label>
		<input type="radio" name="supplierQuotationItem[package]" value="1"  |-if $supplierQuotationItem->isNew() and $supplierQuotationItemRelated neq ''-||-if $supplierQuotationItemRelated->getPackage() eq 1-|checked="checked"|-/if-||-else-||-if $supplierQuotationItem->getPackage() eq 1-|checked="checked"|-/if-||-/if-| > Empaques Unitarios
		<input type="radio" name="supplierQuotationItem[package]" value="2" |-if $supplierQuotationItem->isNew() and $supplierQuotationItemRelated neq ''-||-if $supplierQuotationItemRelated->getPackage() eq 2-|checked="checked"|-/if-||-else-||-if $supplierQuotationItem->getPackage() eq 2-|checked="checked"|-/if-||-/if-|> Bultos
	</p>
	<div id="unitFormOptions">
		<h3>Dimensiones Unidad:</h3> 
		<p><label for="supplierQuotationItem[unitHeight]">Alto:</label> <input name="supplierQuotationItem[unitHeight]" type="text" value="|-if $supplierQuotationItem->isNew() and $supplierQuotationItemRelated neq ''-||-$supplierQuotationItemRelated->getUnitHeight()-||-else-||-$supplierQuotationItem->getUnitHeight()-||-/if-|" size="6" /> 
		cm x </p>
		<p><label for="supplierQuotationItem[unitLength]">Largo:</label> <input name="supplierQuotationItem[unitLength]" type="text" value="|-if $supplierQuotationItem->isNew() and $supplierQuotationItemRelated neq ''-||-$supplierQuotationItemRelated->getUnitLength()-||-else-||-$supplierQuotationItem->getUnitLength()-||-/if-|" size="6" /> 
		cm x </p>
		<p><label for="supplierQuotationItem[unitWidth]">Ancho:</label> <input name="supplierQuotationItem[unitWidth]" type="text" value="|-if $supplierQuotationItem->isNew() and $supplierQuotationItemRelated neq ''-||-$supplierQuotationItemRelated->getUnitWidth()-||-else-||-$supplierQuotationItem->getUnitWidth()-||-/if-|" size="6" />
		cm.</p>
		<p>
			<label for="supplierQuotationItem[unitGrossWeigth]">Peso Bruto Unidad:</label> <input name="supplierQuotationItem[unitGrossWeigth]" type="text" value="|-if $supplierQuotationItem->isNew() and $supplierQuotationItemRelated neq ''-||-$supplierQuotationItemRelated->getUnitGrossWeigth()-||-else-||-$supplierQuotationItem->getUnitGrossWeigth()-||-/if-|" size="6" /> 
			kg.
		</p>
	</div>
<div id="cartonFormOptions">
		<h3>Dimensiones Bulto:</h3> 
		<p>
			<label for="supplierQuotationItem[unitsPerCarton]">Unidades por Bulto:</label> <input name="supplierQuotationItem[unitsPerCarton]" type="text" value="|-if $supplierQuotationItem->isNew() and $supplierQuotationItemRelated neq ''-||-$supplierQuotationItemRelated->getUnitsPerCarton()-||-else-||-$supplierQuotationItem->getUnitsPerCarton()-||-/if-|" size="8" /> 
			unidades.
		</p>
		<p>
			<label for="supplierQuotationItem[cartonHeight]">Alto: </label> <input name="supplierQuotationItem[cartonHeight]" type="text" value="|-if $supplierQuotationItem->isNew() and $supplierQuotationItemRelated neq ''-||-$supplierQuotationItemRelated->getCartonHeight()-||-else-||-$supplierQuotationItem->getCartonHeight()-||-/if-|" size="6" /> 
			cm x </p>
		<p>
			<label for="supplierQuotationItem[cartonWidth]">Largo: </label> <input name="supplierQuotationItem[cartonLength]" type="text" value="|-if $supplierQuotationItem->isNew() and $supplierQuotationItemRelated neq ''-||-$supplierQuotationItemRelated->getCartonLength()-||-else-||-$supplierQuotationItem->getCartonLength()-||-/if-|" size="6" /> 
			cm x </p>
		<p>
			<label for="supplierQuotationItem[cartonWidth]">Ancho: </label> <input name="supplierQuotationItem[cartonWidth]" type="text" value="|-if $supplierQuotationItem->isNew() and $supplierQuotationItemRelated neq ''-||-$supplierQuotationItemRelated->getCartonWidth()-||-else-||-$supplierQuotationItem->getCartonWidth()-||-/if-|" size="6" />
			cm.</p>
		<p>
			<label for="supplierQuotationItem[cartonGrossWeigth]">Peso Bruto</label>
			<input name="supplierQuotationItem[cartonGrossWeigth]" type="text" value="|-if $supplierQuotationItem->isNew() and $supplierQuotationItemRelated neq ''-||-$supplierQuotationItemRelated->getCartonGrossWeigth()-||-else-||-$supplierQuotationItem->getCartonGrossWeigth()-||-/if-|" size="6" /> 
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
	<p><strong>Comentarios:</strong></p>
	<p>Historial de comentarios:</p>
	<p>|-include file="ImportSupplierQuotationItemCommentsInclude.tpl" supplierQuotationItem=$supplierQuotationItem-|</p>
	<p></p>
	<p>A continuacion podra dejar un comentario en el historial de esta cotizacion respecto a los cambios que realice en la cotizacion de este item</p>
	<p>
		<label>Nuevo Comentario.</label>
		<textarea name="supplierQuotationItem[comments]" cols="60" rows="8" wrap="virtual">|-$supplierQuotationItem->getSupplierComments()-|</textarea>
	</p>
	<p>
		<input type="hidden" name="token" value="|-$token-|" />
		<input type="hidden" name="do" value="importSupplierQuoteDoReplaceItem" id="do" />
		<input type="submit" value="Cotizar Item">
		<input type="button" name="cancel" value="Cancelar" onClick="javascript:history.go(-1)"/>
	</p>
	</fieldset>
</form>