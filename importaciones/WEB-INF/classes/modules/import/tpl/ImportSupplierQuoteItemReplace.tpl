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
|- assign var=product value=$supplierQuoteItem->getProduct()-|
<h2>Solicitud de Cotización</h2>
<h1>Cotización de Producto: Reemplazo de Producto "|-$product->getSupplierProductCode()-|"</h1>
<p>A continuación podrá ingresar los datos de reemplazo del |-$product->getSupplierProductCode()-|. Para guardar el producto de reemplazo y la la cotización del producto, luego de completar todos los campos haga click en "Cotizar Item". Tenga en cuenta que solo podra proponer un reemplazo al producto.
<form action="Main.php" method="post">
	<fieldset>
		<legend>Detalle del producto</legend>
		<input type="hidden" name="supplierQuoteItem[id]" value="|-$supplierQuoteItem->getId()-|" id="supplierQuoteItem[id]" />
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
		<label>Cantidad</label><input name="quatity" type="text" size="10" readonly="true" class="readOnly right" value="|-$supplierQuoteItem->getQuantity()-|"/> unidades
	</p>-->
	<p>
		<label>Empaque</label>
	</p>
	<p>
		<label>El producto se embarcara en</label>
		<input type="radio" name="supplierQuoteItem[package]" value="1"  |-if $supplierQuoteItem->isNew() and $supplierQuoteItemRelated neq ''-||-if $supplierQuoteItemRelated->getPackage() eq 1-|checked="checked"|-/if-||-else-||-if $supplierQuoteItem->getPackage() eq 1-|checked="checked"|-/if-||-/if-| > Empaques Unitarios
		<input type="radio" name="supplierQuoteItem[package]" value="2" |-if $supplierQuoteItem->isNew() and $supplierQuoteItemRelated neq ''-||-if $supplierQuoteItemRelated->getPackage() eq 2-|checked="checked"|-/if-||-else-||-if $supplierQuoteItem->getPackage() eq 2-|checked="checked"|-/if-||-/if-|> Bultos
	</p>
	<div id="unitFormOptions">
		<h3>Dimensiones Unidad:</h3> 
		<p><label for="supplierQuoteItem[unitHeight]">Alto:</label> <input name="supplierQuoteItem[unitHeight]" type="text" value="|-if $supplierQuoteItem->isNew() and $supplierQuoteItemRelated neq ''-||-$supplierQuoteItemRelated->getUnitHeight()-||-else-||-$supplierQuoteItem->getUnitHeight()-||-/if-|" size="6" /> 
		cm x </p>
		<p><label for="supplierQuoteItem[unitLength]">Largo:</label> <input name="supplierQuoteItem[unitLength]" type="text" value="|-if $supplierQuoteItem->isNew() and $supplierQuoteItemRelated neq ''-||-$supplierQuoteItemRelated->getUnitLength()-||-else-||-$supplierQuoteItem->getUnitLength()-||-/if-|" size="6" /> 
		cm x </p>
		<p><label for="supplierQuoteItem[unitWidth]">Ancho:</label> <input name="supplierQuoteItem[unitWidth]" type="text" value="|-if $supplierQuoteItem->isNew() and $supplierQuoteItemRelated neq ''-||-$supplierQuoteItemRelated->getUnitWidth()-||-else-||-$supplierQuoteItem->getUnitWidth()-||-/if-|" size="6" />
		cm.</p>
		<p>
			<label for="supplierQuoteItem[unitGrossWeigth]">Peso Bruto Unidad:</label> <input name="supplierQuoteItem[unitGrossWeigth]" type="text" value="|-if $supplierQuoteItem->isNew() and $supplierQuoteItemRelated neq ''-||-$supplierQuoteItemRelated->getUnitGrossWeigth()-||-else-||-$supplierQuoteItem->getUnitGrossWeigth()-||-/if-|" size="6" /> 
			kg.
		</p>
	</div>
<div id="cartonFormOptions">
		<h3>Dimensiones Bulto:</h3> 
		<p>
			<label for="supplierQuoteItem[unitsPerCarton]">Unidades por Bulto:</label> <input name="supplierQuoteItem[unitsPerCarton]" type="text" value="|-if $supplierQuoteItem->isNew() and $supplierQuoteItemRelated neq ''-||-$supplierQuoteItemRelated->getUnitsPerCarton()-||-else-||-$supplierQuoteItem->getUnitsPerCarton()-||-/if-|" size="8" /> 
			unidades.
		</p>
		<p>
			<label for="supplierQuoteItem[cartonHeight]">Alto: </label> <input name="supplierQuoteItem[cartonHeight]" type="text" value="|-if $supplierQuoteItem->isNew() and $supplierQuoteItemRelated neq ''-||-$supplierQuoteItemRelated->getCartonHeight()-||-else-||-$supplierQuoteItem->getCartonHeight()-||-/if-|" size="6" /> 
			cm x </p>
		<p>
			<label for="supplierQuoteItem[cartonWidth]">Largo: </label> <input name="supplierQuoteItem[cartonLength]" type="text" value="|-if $supplierQuoteItem->isNew() and $supplierQuoteItemRelated neq ''-||-$supplierQuoteItemRelated->getCartonLength()-||-else-||-$supplierQuoteItem->getCartonLength()-||-/if-|" size="6" /> 
			cm x </p>
		<p>
			<label for="supplierQuoteItem[cartonWidth]">Ancho: </label> <input name="supplierQuoteItem[cartonWidth]" type="text" value="|-if $supplierQuoteItem->isNew() and $supplierQuoteItemRelated neq ''-||-$supplierQuoteItemRelated->getCartonWidth()-||-else-||-$supplierQuoteItem->getCartonWidth()-||-/if-|" size="6" />
			cm.</p>
		<p>
			<label for="supplierQuoteItem[cartonGrossWeigth]">Peso Bruto</label>
			<input name="supplierQuoteItem[cartonGrossWeigth]" type="text" value="|-if $supplierQuoteItem->isNew() and $supplierQuoteItemRelated neq ''-||-$supplierQuoteItemRelated->getCartonGrossWeigth()-||-else-||-$supplierQuoteItem->getCartonGrossWeigth()-||-/if-|" size="6" /> 
			kg.		</p>			
</div>
	|-if $quantitiesOnQuotesFlag -|
	<p>
		<label>Cantidad</label>
		|-$supplierQuoteItem->getQuantity()-| Unidades
	</p>
	|-/if-|
	<p>
|-assign var=incoterm value=$supplierQuoteItem->getIncoterm()-|
|-assign var=port value=$supplierQuoteItem->getPort()-|
		<label>Precio: [|-$incoterm->getName()-| |-$port->getName()-|]</label> <input name="supplierQuoteItem[price]" type="text" id="supplierQuoteItem[price]" value="|-$supplierQuoteItem->getPrice()-|" size="8"> 
	US$/u.
	</p>
	<p>
		<label>Entrega: </label> <input name="supplierQuoteItem[delivery]" type="text" value="|-$supplierQuoteItem->getDelivery()-|" size="6" /> 
	dias.</p>
	<p><strong>Comentarios:</strong></p>
	<p>Historial de comentarios:</p>
	<p>|-include file="ImportSupplierQuoteItemCommentsInclude.tpl" supplierQuoteItem=$supplierQuoteItem-|</p>
	<p></p>
	<p>A continuacion podra dejar un comentario en el historial de esta cotizacion respecto a los cambios que realice en la cotizacion de este item</p>
	<p>
		<label>Nuevo Comentario.</label>
		<textarea name="supplierQuoteItem[comments]" cols="60" rows="8" wrap="virtual">|-$supplierQuoteItem->getSupplierComments()-|</textarea>
	</p>
	<p>
		<input type="hidden" name="token" value="|-$token-|" />
		<input type="hidden" name="do" value="importSupplierQuoteDoReplaceItem" id="do" />
		<input type="submit" value="Cotizar Item">
		<input type="button" name="cancel" value="Cancelar" onClick="javascript:history.go(-1)"/>
	</p>
	</fieldset>
</form>