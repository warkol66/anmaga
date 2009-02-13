<div id="clientQuotationItemLister">
	<table id="clientQuotationItemList" cellpadding="4" cellspacing="0" class="tableTdBorders">
		<tr>
			<th>Código</th>
			<th>Nombre</th>
			<th>Cantidad</th>
			<th>Precio Unitario</th>			
		</tr>
		|-foreach from=$clientQuotation->getClientQuotationItems() item=item name=for_clientQuotationsItems-|
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
