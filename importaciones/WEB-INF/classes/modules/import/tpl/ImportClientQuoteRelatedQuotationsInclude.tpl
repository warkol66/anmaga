<h3>Últimos Precios Cotizados al Cliente sobre el Item</h3>

|- if $lastClientQuotationItemsRelated|@count neq 0-|
<table id="clientQuotationItemList" cellpadding="4" cellspacing="0" class="tableTdBorders">
	<tr>
		<th>Fecha</th>
		<th>Precio Unitario Cotizado</th>
	</tr>
|-foreach from=$lastClientQuotationItemsRelated item=related name=for_relatedQuotations-|
	<tr>
		<td>|-$related->getCreatedAt()-|</td>
		<td>|-$related->getPrice()-|</td>
	</tr>
|-/foreach-|
</table>
|-else-|
	<p>Es la primera vez que se cotiza este producto al cliente</p>
|-/if-|
