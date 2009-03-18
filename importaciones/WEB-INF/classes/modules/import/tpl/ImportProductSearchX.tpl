<script type="text/javascript">
	if ($('productSearchMsgBox'))
		$('productSearchMsgBox').innerHTML = '';
</script>

|-if $results|count neq 0 -|
<table id="productList" cellpadding="4" cellspacing="0" class="tableTdBorders">
	<tr>
		<th>Código</th>
		<th>Nombre</th>
		<th>Descripción</th>
		<th></th>
	</tr>
	|-foreach from=$results item=product name=for_searchResults-|
	<tr>
		<td>|-$product->getCode()-|</td>
		<td>|-$product->getName()-|</td>
		<td>|-$product->getDescription()-|</td>
		<td>
			<form action="Main.php" method="post">
				<input type="hidden" name="clientQuotationItem[productId]" value="|-$product->getId()-|" />
	<!--			<label for="Cantidad">Cantidad</label> -->
				<input type="hidden" name="clientQuotationItem[quantity]" value="1" id="clientQuotationItem[quantity]" />
				<input type="hidden" name="do" value="importClientQuoteAddItemX" id="do">
				<input type="hidden" name="clientQuotationItem[clientQuotationId]" value="|-$clientQuotation->getId()-|" id="clientQuotationItem[clientQuotationId]"/>
				<input type="button" value="Agregar producto" onClick="javascript:importAddItemToClientQuotationX(this.form)"> 
			</form>
		</td>
	</tr>
	|-/foreach-|
</table>
|-else-|
	<p>No se han encontrado resultados, por favor realice una nueva búsqueda</p>
|-/if-|