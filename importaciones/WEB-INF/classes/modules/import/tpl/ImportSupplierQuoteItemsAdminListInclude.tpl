<div id="supplierQuotationItemLister">
	<table id="supplierQuotationItemList" cellpadding="4" cellspacing="0" class="tableTdBorders">
		<tr>
			<th>Codigo</th>
			<th>Nombre</th>
			<th>Cantidad Pedida</th>
			<th>Precio Unitario del Proveedor</th>			
		</tr>
		|-foreach from=$supplierQuotation->getSupplierQuotationItems() item=item name=for_supplierQuotationsItems-|
		|-assign var=product value=$item->getProduct()-|
		<tr>
			<td>|-$product->getCode()-|</td>
			<td>|-$product->getName()-|</td>
			<td>|-$item->getQuantity()-|</td>
			<td>|-$item->getPrice()-|</td>			
		</tr>
		|-/foreach-|
	</table>
</div>	
