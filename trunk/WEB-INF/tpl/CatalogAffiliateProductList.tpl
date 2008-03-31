<table border='0' cellpadding='0' cellspacing='0' width='100%'>
	<tr>
		<td class='title'>Precios Por Afiliado</td>
	</tr>
	<tr>
		<td class='underlineTitle'><img src="images/clear.gif" height='3' width='1'></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class='backgroundTitle'>Listado de Precios Por Afiliado</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Seleccione una afiliado para buscar su lista de precios.</td>
	</tr>
	<tr>
	    <td>
			<form method="get" >
				<select name="affiliateId">
					<option value="" selected="selected">Seleccione un Afiliado</option>
				|-foreach from=$affiliates item=affiliate name=for_affiliates-|
					<option value="|-$affiliate->getId()-|" selected="selected">|-$affiliate->getName()-|</option>
				|-/foreach-|
				</select>
				<input type="hidden" name="do" value="catalogAffiliateProductList" />
				<input type="submit" name="search" value="Ver Lista de Precios" />
			</form>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
</table>
|-if isset($productNodes)-|
	<table width="100%" class="tableTdBorders" id="tabla-products"> 
		<thead> 
			<tr> 
				<th width="5%" class="thFillTitle">Código Producto</th> 
				<th width="5%" class="thFillTitle">Código Producto Para Afiliado</th>
				<th width="35%" class="thFillTitle">Nombre</th> 
				<th width="50%" class="thFillTitle">Descripción</th> 
				<th width="5%" class="thFillTitle">Precio</th> 
			</tr>
		</thead>
		<tbody>  |-foreach from=$productNodes item=productNode name=for_products-| |-assign var=product value=$productNode->getInfo()-|
		<tr>
			<td nowrap class="tdSize1 right">|-$product->getcode()-|</td>
			<td nowrap class="tdSize1 right">|-$product->getAffiliateCode($affiliateId)-| </td>
			<td class="tdSize1">|-$productNode->getname()-|</td>
			<td class="tdSize1">|-$product->getdescription()-|</td>
			<td nowrap class="tdSize1 right">|-if $product->getAffiliatePrice($affiliateId) neq 0-||-$product->getAffiliatePrice($affiliateId)|number_format:2:",":"."-||-/if-|</td>
		</tr>
		|-foreachelse-|
		<tr>
			<td colspan="5">Sin Lista de Productos</td>
		</tr>
		|-/foreach-|
		<tr>
			<td colspan="5">|-include file="PaginateInclude.tpl"-|</td>
		</tr> 
		</tbody> 
	</table> 
|-/if-|
</div>