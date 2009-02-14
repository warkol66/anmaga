<div id="clientQuotationItemLister">
	
<form action="Main.php" method="post" >
	<table id="clientQuotationItemList" cellpadding="4" cellspacing="0" class="tableTdBorders">
		<tr>
			<th></th>
			<th>Código</th>
			<th>Nombre</th>
			<th>Cantidad</th>
			<th>Precio al Cliente</th>
			<th>Proveedor</th>			
			<th>Precio del Proveedor</th>			
		</tr>
		|-foreach from=$clientQuotation->getClientQuotationItems() item=item name=for_clientQuotationsItems-|
		|-assign var=product value=$item->getProduct()-|
		<tr>
			<th>|-if not $item->hasASupplierQuotationRelated()-|<input type="checkbox" name="clientQuoteItems[]" value="|-$item->getId()-|" />|-else-|<input type="checkbox" name="Quoted" value="" disabled="disabled"/>|-/if-|</th>
			<td>|-$product->getCode()-|</td>
			<td>|-$product->getName()-|</td>
			<td>|-$item->getQuantity()-|</td>
			<td>|-if $item->getPrice() eq 0-|No se ha cotizado|-else-||-$item->getPrice()|number_format:2:",":"."-||-/if-|</td>			
			|-assign var=supplierQuotationItem value=$item->getSupplierQuotationItem()-|
			<td>|-if $supplierQuotationItem neq ''-||-assign var=supplierQuotation value=$supplierQuotationItem->getSupplierQuotation() -||-assign var=supplier value=$supplierQuotation->getSupplier()-||-$supplier->getName()-||-/if-|</td>
			<td>|-if $supplierQuotationItem neq ''-||-if $supplierQuotationItem->getPrice() eq 0-|No se ha cotizado|-else-||-$supplierQuotationItem->getPrice()|number_format:2:",":"."-||-/if-||-/if-|</td>			
		</tr>
		|-/foreach-|
	</table>

	<p>
		<select name="supplierId">
		|-foreach from=$suppliers item=supplier name=for_suppliers-|
			<option value="|-$supplier->getId()-|">|-$supplier->getName()-|</option>
		|-/foreach-|
		</select>
		<input type="hidden" name="clientQuotationId" value="|-$clientQuotation->getId()-|" />
		<input type="hidden" name="do" value="importSupplierQuoteCreate" />
		<input type="submit" value="Generar Cotización a Proveedor con los seleccionados" />
	</p>
</form>

</div>