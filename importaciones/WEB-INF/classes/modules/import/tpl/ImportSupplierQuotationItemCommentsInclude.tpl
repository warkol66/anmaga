<div id="supplierQuotationItemCommentsLister">
	<table id="supplierQuotationItemCommentsListTable" cellpadding="3" cellspacing="0" class="tableTdBorders">
		<tr>
			<th>Fecha</th>
			<th>Usuario</th>
			<th>Precio</th>
			<th>Dias de Entrega</th>
			<th>Comentario</th>			
		</tr>
		|-foreach from=$supplierQuotationItem->getSupplierQuotationItemComments() item=comment name=for_supplierQuotationsItemsComments-|
		<tr>
			<td>|-$comment->getCreatedAt()-|</td>
			<td>
				|-if $comment->getUserName() neq ''-|Usuario Anmaga: |-$comment->getUserName()-||-/if-|
				|-if $comment->getSupplierName() neq ''-|Proveedor: |-$comment->getSupplierName()-||-/if-|
			</td>
			<td>|-$comment->getPrice()-|</td>
			<td>|-$comment->getDelivery()-| Dias.</td>
			<td>|-$comment->getComments()-|</td>			
		</tr>
		|-/foreach-|
	</table>
</div>	
