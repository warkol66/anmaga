<h3>Ultimos Precios Cotizados al Cliente sobre el Item</h3>

|- if $lastClientQuotationItemsRelated|@count neq 0-|
<table id="clientQuotationItemList" cellpadding="4" cellspacing="0" class="tableTdBorders">
	<tr>
		<th>Fecha</th>
		<th>Precio Unitario Cotizado</th>
	</tr>
|-foreach from=$lastClientQuotationItemsRelated item=related name=for_relatedQuotations-|
	<td>
		<th>|-$related->getPrice()-|</th>
		<th>|-$related->getCreatedAt()-|</th>
	</td>
|-/foreach-|
</table>
|-else-|
	<p>Es la primera vez que se cotiza este producto al cliente</p>
|-/if-|
