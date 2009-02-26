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
			<th></th>			
		</tr>
		|-foreach from=$clientQuotation->getClientQuotationItems() item=item name=for_clientQuotationsItems-|
		|-assign var=product value=$item->getProduct()-|
		<tr>
			<th>|-if not $item->hasASupplierQuotationRelated()-|<input type="checkbox" href="../actions/ImportIncotermsDoActivateAction.php" title="ImportIncotermsDoActivateAction" name="clientQuoteItems[]" value="|-$item->getId()-|" />|-else-|<input type="checkbox" name="Quoted" value="" disabled="disabled"/>|-/if-|</th>
			<td>|-$product->getCode()-|</td>
			<td>|-$product->getName()-|</td>
			<td>|-$item->getQuantity()-|</td>
			<td>|-if $item->getPrice() eq 0-|No se ha cotizado|-else-||-$item->getPrice()|number_format:2:",":"."-||-/if-|</td>			
			|-assign var=supplierQuotationItem value=$item->getSupplierQuotationItem()-|
			<td>|-if $supplierQuotationItem neq ''-||-assign var=supplierQuotation value=$supplierQuotationItem->getSupplierQuotation() -||-assign var=supplier value=$supplierQuotation->getSupplier()-||-$supplier->getName()-||-/if-|</td>
			<td>|-if $supplierQuotationItem neq ''-||-if $supplierQuotationItem->getPrice() eq 0-|No se ha cotizado|-else-||-$supplierQuotationItem->getPrice()|number_format:2:",":"."-||-/if-||-/if-|</td>
			<td nowrap="nowrap">
				|-if $supplierQuotationItem neq ''-||-if "importClientQuoteItemSetPrice"|security_user_has_access -|
					|-if $supplierQuotationItem->getPrice() neq 0-|
						<a href="Main.php?do=importClientQuoteItemSetPrice&amp;clientQuotationItemId=|-$item->getId()-|">Fijar Precio Cliente</a>	
					|-/if-|
				|-/if-|
				|-/if-|
			</td>			
		</tr>
		|-/foreach-|
	</table>

	<p>
		<select name="supplierId">
		|-foreach from=$suppliers item=supplier name=for_suppliers-|
			<option value="|-$supplier->getId()-|">|-$supplier->getName()-|</option>
		|-/foreach-|
		</select>
		<select name="incotermId">
		|-foreach from=$incoterms item=incoterm name=for_incoterm-|
			<option value="|-$incoterm->getId()-|">|-$incoterm->getName()-|</option>
		|-/foreach-|
		</select>
		<select name="portId">
		|-foreach from=$ports item=port name=for_ports-|
			<option value="|-$port->getId()-|">|-$port->getName()-|</option>
		|-/foreach-|
		</select>
		<input type="hidden" name="clientQuotationId" value="|-$clientQuotation->getId()-|" />
		<input type="hidden" name="do" value="importSupplierQuoteCreate" />
		<input type="submit" value="Generar Cotización a Proveedor con los seleccionados" />
	</p>
</form>

</div>