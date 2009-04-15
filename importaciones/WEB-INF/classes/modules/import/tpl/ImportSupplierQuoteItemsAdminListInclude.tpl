<div id="supplierQuotationItemLister">
	<table id="supplierQuotationItemList" cellpadding="4" cellspacing="0" class="tableTdBorders">
		<tr>
			<th>Código</th>
			<th>Nombre</th>
			<th>Estado</th>
			<th>Plazo de Entrega</th>
<!--			<th>Cantidad Pedida</th>  -->
			<th>Precio Unitario del Proveedor</th>
			<th></th>		
		</tr>
		|-foreach from=$supplierQuotation->getSupplierQuotationItems() item=item name=for_supplierQuotationsItems-|
		|-assign var=product value=$item->getProduct()-|
		<tr>
			<td>|-$product->getCode()-|</td>
			<td>|-$product->getName()-|</td>
			<td>|-$item->getStatusName()-|</td>
			<td>|-$item->getDelivery()-| Dias.</td>
<!--			<td>|-$item->getQuantity()-|</td>  -->
			<td>|-if $item->getPrice() eq 0-|No se ha cotizado|-else-||-$item->getPrice()|number_format:2:",":"."-||-/if-|</td>
			<td>|-if $item->isQuoted()-|
				<form action="Main.php" method="post">
					<input type="hidden" name="supplierQuotationItemId" value="|-$item->getId()-|" />
					<input type="hidden" name="do" value="importSupplierQuoteItemsNegociate" />
					<input type="submit" value="Negociar" />
				</form>
				|-/if-|
			</td>
		</tr>
		|-/foreach-|
	</table>
</div>	
