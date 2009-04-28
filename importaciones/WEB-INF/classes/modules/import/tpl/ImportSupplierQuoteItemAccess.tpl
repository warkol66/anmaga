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

<h2>##import,39,Solicitud de Cotización##</h2>
<h1>##import,40,Cotización de Producto:## "|-$product->getSupplierProductCode()-|"</h1>
<p>##import,41,A continuación podrá ingresar los datos de la cotización del producto## |-$product->getSupplierProductCode()-|.##import,42,Para guardar el precio y confirmar la cotización del producto, haga click en "Cotizar Item". Recuerde que puede modificar los datos del item mientras no haya confirmado la cotización completa.##
<form action="Main.php" method="post">
	<fieldset title="##import,1,Exportaciones##">
		<legend>##import,43,Detalle del producto##</legend>
	<input type="hidden" name="supplierQuotationItem[id]" value="|-$supplierQuotationItem->getId()-|" id="supplierQuotationItem[id]" />
	<p>
		<label>##import,30,Código##</label>
		<input name="suppliersCode" type="text" size="15" readonly="true" value="|-$product->getSupplierProductCode()-|" class="readOnly" />
	</p>
	<p>
		<label>##import,31,Nombre##</label>
		<input name="name" type="text" size="45" readonly="true" value="|-if $activeLanguage == 'eng'-||-$product->getName()-||-elseif $activeLanguage == 'cn'-||-$product->getNameChinese()-||-elseif $activeLanguage == 'esp'-||-$product->getNameSpanish()-||-else-||-$product->getName()-||-/if-|" class="readOnly" />
		
	</p>		
	<p>
		<label>##import,44,Descripción##</label>
		<textarea name="description" cols="70" rows="8" readonly="readonly" wrap="virtual" class="readOnly">|-if $activeLanguage == 'eng'-||-$product->getDescription()-||-elseif $activeLanguage == 'cn'-||-$product->getDescriptionChinese()-||-elseif $activeLanguage == 'esp'-||-$product->getDescriptionSpanish()-||-else-||-$product->getDescription()-||-/if-|</textarea>
	</p>
<!--	<p>
		<label>##import,33,Cantidad##</label><input name="quatity" type="text" size="10" readonly="true" class="readOnly right" value="|-$supplierQuotationItem->getQuantity()-|"/> unidades
	</p>-->
	<h3>##import,45,Información de Empaque##</h3>
	<p>
		<label>##import,46,El producto se entrega en##</label>
		<input type="radio" name="supplierQuotationItem[package]" value="1"  |-if $supplierQuotationItem->isNew() and $supplierQuotationItemRelated neq ''-||-if $supplierQuotationItemRelated->getPackage() eq 1-|checked="checked"|-/if-||-else-||-if $supplierQuotationItem->getPackage() eq 1-|checked="checked"|-/if-||-/if-| > ##import,47,Empaques Unitarios##
		<input type="radio" name="supplierQuotationItem[package]" value="2" |-if $supplierQuotationItem->isNew() and $supplierQuotationItemRelated neq ''-||-if $supplierQuotationItemRelated->getPackage() eq 2-|checked="checked"|-/if-||-else-||-if $supplierQuotationItem->getPackage() eq 2-|checked="checked"|-/if-||-/if-|> ##import,48,Bultos##
	</p>
	<div id="unitFormOptions">
		<h3>##import,49,Dimensiones Unidad##</h3> 
		<p><label for="supplierQuotationItem[unitHeight]">##import,50,Alto##:</label> <input name="supplierQuotationItem[unitHeight]" type="text" value="|-if $supplierQuotationItem->isNew() and $supplierQuotationItemRelated neq ''-||-$supplierQuotationItemRelated->getUnitHeight()-||-else-||-$supplierQuotationItem->getUnitHeight()-||-/if-|" size="6" /> 
		##import,53,cm.## x </p>
		<p><label for="supplierQuotationItem[unitLength]">##import,51,Largo##:</label> <input name="supplierQuotationItem[unitLength]" type="text" value="|-if $supplierQuotationItem->isNew() and $supplierQuotationItemRelated neq ''-||-$supplierQuotationItemRelated->getUnitLength()-||-else-||-$supplierQuotationItem->getUnitLength()-||-/if-|" size="6" /> 
		##import,53,cm.## x </p>
		<p><label for="supplierQuotationItem[unitWidth]">##import,52,Ancho##:</label> <input name="supplierQuotationItem[unitWidth]" type="text" value="|-if $supplierQuotationItem->isNew() and $supplierQuotationItemRelated neq ''-||-$supplierQuotationItemRelated->getUnitWidth()-||-else-||-$supplierQuotationItem->getUnitWidth()-||-/if-|" size="6" />
		##import,53,cm.##</p>
		<p>
			<label for="supplierQuotationItem[unitGrossWeigth]">##import,54,Peso Bruto Unidad##:</label> <input name="supplierQuotationItem[unitGrossWeigth]" type="text" value="|-if $supplierQuotationItem->isNew() and $supplierQuotationItemRelated neq ''-||-$supplierQuotationItemRelated->getUnitGrossWeigth()-||-else-||-$supplierQuotationItem->getUnitGrossWeigth()-||-/if-|" size="6" /> 
			##import,55,kg.##
		</p>
	</div>
<div id="cartonFormOptions">
		<h3>##import,56,Dimensiones Bulto##:</h3> 
		<p>
			<label for="supplierQuotationItem[unitsPerCarton]">##import,57,Unidades por Bulto##:</label> <input name="supplierQuotationItem[unitsPerCarton]" type="text" value="|-if $supplierQuotationItem->isNew() and $supplierQuotationItemRelated neq ''-||-$supplierQuotationItemRelated->getUnitsPerCarton()-||-else-||-$supplierQuotationItem->getUnitsPerCarton()-||-/if-|" size="8" /> 
			##import,58,unidades##.
		</p>
		<p>
			<label for="supplierQuotationItem[cartonHeight]">##import,50,Alto##:</label> <input name="supplierQuotationItem[cartonHeight]" type="text" value="|-if $supplierQuotationItem->isNew() and $supplierQuotationItemRelated neq ''-||-$supplierQuotationItemRelated->getCartonHeight()-||-else-||-$supplierQuotationItem->getCartonHeight()-||-/if-|" size="6" /> 
			##import,53,cm.## x </p>
		<p>
			<label for="supplierQuotationItem[cartonWidth]">##import,51,Largo##:</label> <input name="supplierQuotationItem[cartonLength]" type="text" value="|-if $supplierQuotationItem->isNew() and $supplierQuotationItemRelated neq ''-||-$supplierQuotationItemRelated->getCartonLength()-||-else-||-$supplierQuotationItem->getCartonLength()-||-/if-|" size="6" /> 
			##import,53,cm.## x </p>
		<p>
			<label for="supplierQuotationItem[cartonWidth]">##import,52,Ancho##:</label> <input name="supplierQuotationItem[cartonWidth]" type="text" value="|-if $supplierQuotationItem->isNew() and $supplierQuotationItemRelated neq ''-||-$supplierQuotationItemRelated->getCartonWidth()-||-else-||-$supplierQuotationItem->getCartonWidth()-||-/if-|" size="6" />
			##import,53,cm.##</p>
		<p>
			<label for="supplierQuotationItem[cartonGrossWeigth]">##import,59,Peso Bruto por bulto##</label>
			<input name="supplierQuotationItem[cartonGrossWeigth]" type="text" value="|-if $supplierQuotationItem->isNew() and $supplierQuotationItemRelated neq ''-||-$supplierQuotationItemRelated->getCartonGrossWeigth()-||-else-||-$supplierQuotationItem->getCartonGrossWeigth()-||-/if-|" size="6" /> 
			##import,55,kg.##</p>			
</div>
	|-if $quantitiesOnQuotationsFlag -|
	<p>
		<label>Cantidad</label>
		|-$supplierQuotationItem->getQuantity()-| Unidades
	</p>
	|-/if-|
	<p>
|-assign var=incoterm value=$supplierQuotationItem->getIncoterm()-|
|-assign var=port value=$supplierQuotationItem->getPort()-|
		<label>##import,60,Precio unitario##: [|-$incoterm->getName()-| |-$port->getName()-|]</label> <input name="supplierQuotationItem[price]" type="text" id="supplierQuotationItem[price]" value="|-$supplierQuotationItem->getPrice()-|" size="8"> 
	##import,61,US$/u##.
	</p>
	<p>
		<label>##import,62,Entrega##: </label> <input name="supplierQuotationItem[delivery]" type="text" value="|-$supplierQuotationItem->getDelivery()-|" size="6" /> 
	##import,35,Dias##</p>
	<p><strong>##import,63,Comentarios##:</strong></p>
	<p>|-include file="ImportSupplierQuotationItemCommentsInclude.tpl" supplierQuotationItem=$supplierQuotationItem-|</p>
	<p>##import,71,A continuación podrá agregar un comentario a esta cotización##</p>
	<p>
		<label>##import,70,Agregar Comentario##</label>
		<textarea name="supplierQuotationItem[comments]" cols="70" rows="6" wrap="virtual">|-$supplierQuotationItem->getSupplierComments()-|</textarea>
	</p>
	<p>
		<input type="hidden" name="token" value="|-$token-|" />
		<input type="hidden" name="do" value="importSupplierQuoteDoEditItem" id="do" />
		<input type="submit" value="##import,64,Cotizar Item##">
		<input type="button" name="cancel" value="##import,65,Cancelar##" onClick="javascript:history.go(-1)"/>
	</p>
	</fieldset>
</form>