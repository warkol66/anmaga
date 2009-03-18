|-if $clientQuotation->isQuoted()-|
	<form action="Main.php" method="post" >
|-/if-|

<div id="clientQuotationItemLister">
	<table id="clientQuotationItemList" cellpadding="4" cellspacing="0" class="tableTdBorders">
		<tr>
			|-if $clientQuotation->isQuoted()-|
				<th></th>
			|-/if-|
			<th>Código</th>
			<th>Nombre</th>
<!--			<th>Cantidad</th>
			<th>Precio Unitario</th>		-->	
		</tr>
		|-foreach from=$clientQuotation->getClientQuotationItems() item=item name=for_clientQuotationsItems-|
		|-assign var=product value=$item->getProduct()-|
		<tr>
			|-if $clientQuotation->isQuoted()-|
				<td><input type="checkbox" name="clientQuoteItems[]" value="|-$item->getId()-|" /></td>
			|-/if-|
			<td>|-$product->getCode()-|</td>
			<td>|-$product->getName()-|</td>
<!--			<td>|-$item->getQuantity()-|</td>
			<td>|-$item->getPrice()-|</td>			-->
		</tr>
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

|-* NOTA DESARROLLO: Este formulario lo tuve que modificar para eliminar la cantidad y precio unitario cuando se agregan productos a la orden
Hace flata un "Remover producto de la orden" y sería bueno verificar que no se haya agregado ya el mismo producto.
También saqué las columnas de ImportClientQuoteAddItemX.tpl *-|