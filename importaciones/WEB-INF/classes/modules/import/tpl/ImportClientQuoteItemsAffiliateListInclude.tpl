|-if $clientQuotation->isQuoted()-|
	<form action="Main.php" method="post" >
|-/if-|

<div id="clientQuotationItemLister">
	<table id="clientQuotationItemList" cellpadding="4" cellspacing="0" class="tableTdBorders">
		<thead>
			|-if $clientQuotation->isQuoted()-|
				<th></th>
			|-/if-|
			<th>Código</th>
			<th>Nombre</th>
			<th>Precio Unitario</th>			
			|-if $clientQuotation->isQuoted()-|
				<th>Cantidad</th>
			|-/if-|			
			<th></th>
		</thead>
		|-foreach from=$clientQuotation->getClientQuotationItems() item=item name=for_clientQuotationsItems-|
		|-assign var=product value=$item->getProduct()-|
		<tbody>
		<tr id="itemProduct|-$item->getProductId()-|">
			|-if $clientQuotation->isQuoted()-|
				<td><input type="checkbox" name="clientQuoteItems[]" value="|-$item->getId()-|" /></td>
			|-/if-|
			<td>|-$product->getCode()-|</td>
			<td>|-$product->getName()-|</td>
			<td>|-$item->getPrice()-|</td>
			|-if $clientQuotation->isQuoted()-|
			<td><input type="text" size="5" name="clientQuoteItemsQuantity[|-$item->getId()-|]" value="" id="clientQuoteItemsQuantity[|-$item->getId()-|]" /></td>
			|-/if-|
			<td>
				|-if $clientQuotation->isNew()-|
				<form action="Main.php" method="post">
					<input type="hidden" name="do" value="importClientQuoteDeleteItemX" />
					<input type="hidden" name="productId" value="|-$item->getProductId()-|" />
					<input type="button" name="submit_go_delete_quotation" value="Borrar" onClick="javascript:importDeleteItemFromClientQuotationX(this.form)" class="buttonImageDelete" />
				</form>
				|-/if-|
			</td>
		</tr>
		</tbody>
		|-/foreach-|
	</table>
</div>	

|-if $clientQuotation->isQuoted()-|
	<p>
		<input type="button" name="selectAll" value="Seleccionar Todos" onClick="javascript:importSelectAllByName('clientQuoteItems[]')" />
	</p>
	<p>
		<input type="hidden" name="clienQuotationId" value="|-$clientQuotation->getId()-|" />
		<input type="hidden" name="do" value="importClientQuotationAccept" id="do" />
		<input type="submit" value="Aceptar Cotización de Elementos Seleccionados" />
	</p>
</form>
|-/if-|