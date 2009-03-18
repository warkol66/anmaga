<div id="supplierQuotationItemLister">
	<table id="supplierQuotationItemList" cellpadding="4" cellspacing="0" class="tableTdBorders">
		<tr>
			<th>Código</th>
			<th>Producto</th>
<!--			<th>Cantidad</th> -->
			<th></th>
		</tr>
		|-foreach from=$supplierQuotation->getSupplierQuotationItems() item=item name=for_supplierQuotationsItems-|
		|-assign var=product value=$item->getProduct()-|
		<tr>
			<td>|-$product->getSupplierProductCode()-|</td>
			<td>|-$product->getName()-|</td>
<!--			<td>|-$item->getQuantity()-|</td> -->
			<td>
				|-if not $supplierQuotation->isConfirmed() -|
				<form action="Main.php" method="get">						
					<input type="hidden" name="do" value="importSupplierQuoteItemAccess" />
					<input type="hidden" name="id" value="|-$item->getid()-|" />
					<input type="hidden" name="token" value="|-$token-|" >
					<input type="submit" name="submit_go_edit_quotation" value="Click aquí para cotizar"/>
				</form>
				|-else-|
				[FOB Shanghai] US$ |-$item->getPrice()|number_format:2:",":"."-| /u.
				|-/if-|
			</td>
		</tr>
		|-/foreach-|
	</table>
</div>	
